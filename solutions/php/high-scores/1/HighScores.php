<?php declare(strict_types=1);

class HighScores
{
  public int $latest;
  public int $personalBest;
  public array $personalTopThree;

  public function __construct(public array $scores)
  {
    $this->personalBest = max($this->scores);
    $this->latest = $this->scores[array_key_last($this->scores)];
    $sorted = $this->scores;
    rsort($sorted);
    $this->personalTopThree = array_slice($sorted, 0, 3);
  }
}
