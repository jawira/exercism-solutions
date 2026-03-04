<?php declare(strict_types=1);

class Game
{
  private Frame $firstFrame;
  private Frame $currentFrame;

  public function __construct()
  {
    $this->firstFrame = $this->currentFrame = new Frame(1);
  }

  public function score(): int
  {
    if ($this->currentFrame->number < 10) {
      throw new Exception();
    }

    $score = 0;
    $frame = $this->firstFrame;
    do {
      $score += $frame->score();
      $frame = $frame->next;
    } while ($frame instanceof Frame);

    return $score;
  }

  public function roll(int $pins): void
  {
    if (!$this->currentFrame->canRoll()) {
      $this->currentFrame = $this->currentFrame->newFrame();
    }
    $this->currentFrame->roll($pins);
  }
}


class Frame
{
  public ?Frame $next = null;
  public ?int $firstRoll = null;
  public ?int $secondRoll = null;

  public function __construct(public readonly int $number)
  {
  }

  public function roll(int $pins): void
  {
    (0 <= $pins && $pins <= 10) or throw new Exception();
    $this->canRoll() or throw new Exception();
    if (is_null($this->firstRoll)) {
      $this->firstRoll = $pins;
      return;
    }
    $this->firstRoll + $pins <= 10 or throw new Exception();
    $this->secondRoll = $pins;
  }

  public function canRoll(): bool
  {
    if ($this->isStrike() || $this->isSpare()) {
      return false;
    }

    return is_null($this->firstRoll) || is_null($this->secondRoll);
  }

  public function newFrame(): Frame
  {
    $nextNumber = $this->number + 1;
    $nextNumber < 11 or throw new Exception();
    $frame = ($nextNumber === 10) ? new TenthFrame($nextNumber) : new Frame($nextNumber);

    return $this->next = $frame;
  }

  public function score(): int
  {
    $this->next instanceof Frame or throw new Exception();
    $score = $this->firstRoll;
    $score += match (true) {
      $this->isStrike() => $this->calculateTwoNextThrows(),
      $this->isSpare() => $this->secondRoll + $this->next->firstRoll,
      default => $this->secondRoll,
    };
    return $score;
  }

  public function isStrike(): bool
  {
    if (is_null($this->firstRoll)) {
      return false;
    }
    return $this->firstRoll === 10;
  }

  public function isSpare(): bool
  {
    if (is_null($this->firstRoll) || is_null($this->secondRoll)) {
      return false;
    }
    return $this->firstRoll + $this->secondRoll === 10;
  }

  private function calculateTwoNextThrows()
  {
    $nextFirst = $this->next?->firstRoll;
    $nextSecond = $this->next?->secondRoll;
    $afterNextFirst = $this->next?->next?->firstRoll;
    $throws = [$nextFirst, $nextSecond, $afterNextFirst];
    $throws = array_filter($throws, fn($throw) => is_int($throw));
    $throws = array_values($throws);
    return $throws[0] + $throws[1];
  }
}

class TenthFrame extends Frame
{
  private ?int $thirdRoll = null;

  public function roll(int $pins): void
  {
    $pins <= 10 or throw new Exception();
    $this->canRoll() or throw new Exception();
    if (is_null($this->firstRoll)) {
      $this->firstRoll = $pins;
      return;
    }
    if (is_null($this->secondRoll)) {
      $this->secondRoll = $pins;
      return;
    }
    if ($this->secondRoll === 10) {
      $this->thirdRoll = $pins;
      return;
    }
    ($this->secondRoll + $pins <= 10) or throw new Exception();
    $this->thirdRoll = $pins;
  }

  public function canRoll(): bool
  {
    if (is_null($this->thirdRoll) && $this->isStrike()) {
      return true;
    }
    if (is_null($this->thirdRoll) && $this->isSpare()) {
      return true;
    }
    return is_null($this->firstRoll) || is_null($this->secondRoll);
  }

  public function score(): int
  {
    is_int($this->secondRoll) or throw new Exception();
    if (($this->isStrike() || $this->isSpare()) && is_null($this->thirdRoll)) {
      throw new Exception();
    }
    return $this->firstRoll + $this->secondRoll + ($this->thirdRoll ?? 0);
  }
}
