<?php declare(strict_types=1);

class RobotSimulator
{
  private array $directions = ['east', 'south', 'west', 'north'];

  /** @param int[] $position */
  public function __construct(private array $position, string $direction)
  {
    while (current($this->directions) !== $direction) {
      next($this->directions);
    }
  }

  public function instructions(string $instructions): void
  {
    foreach (str_split($instructions) as $instruction) {
      match ($instruction) {
        'L' => $this->turnLeft(),
        'R' => $this->turnRight(),
        'A' => $this->advance(),
      };
    }
  }

  /** @return int[] */
  public function getPosition(): array
  {
    return $this->position;
  }

  public function getDirection(): string
  {
    return current($this->directions);
  }

  private function turnRight(): void
  {
    if (next($this->directions) === false) {
      reset($this->directions);
    }
  }

  private function turnLeft(): void
  {

    if (prev($this->directions) === false) {
      end($this->directions);
    }
  }

  private function advance(): void
  {
    $key = key($this->directions);
    $positionKey = ($key % 2);
    in_array($key, [0, 3]) ? $this->position[$positionKey]++ : $this->position[$positionKey]--;
  }
}
