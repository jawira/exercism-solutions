<?php declare(strict_types=1);

class Robot
{
  static private string $latestName = 'AA000';
  private string $name;

  public function __construct()
  {
    $this->reset();
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function reset(): void
  {
    $this->name = self::$latestName++;
  }
}
