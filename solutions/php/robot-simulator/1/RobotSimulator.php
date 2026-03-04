<?php declare(strict_types=1);

class RobotSimulator
{
  private array $coords = ['east', 'south', 'west', 'north'];

  /** @param int[] $position */
  public function __construct(private array $position, string $direction)
  {
    while (current($this->coords) !== $direction) {
      next($this->coords);
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
    return current($this->coords);
  }

  private function turnRight(): void
  {
    if (next($this->coords) === false) {
      reset($this->coords);
    }
  }

  private function turnLeft(): void
  {

    if (prev($this->coords) === false) {
      end($this->coords);
    }
  }

  private function advance(): void
  {
    $key = key($this->coords);
    $positionKey = ($key % 2);
    in_array($key, [0, 3]) ? $this->position[$positionKey]++ : $this->position[$positionKey]--;
  }
}
