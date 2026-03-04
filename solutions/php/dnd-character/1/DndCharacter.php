<?php declare(strict_types=1);

class DndCharacter
{
  public int $strength;
  public int $dexterity;
  public int $constitution;
  public int $intelligence;
  public int $wisdom;
  public int $charisma;
  public int $hitpoints;

  public function __construct()
  {
    $this->strength = self::ability();
    $this->dexterity = self::ability();
    $this->constitution = self::ability();
    $this->intelligence = self::ability();
    $this->wisdom = self::ability();
    $this->charisma = self::ability();
    $this->hitpoints = $this->constitution + 10 >> 1;
  }

  static public function generate(): DndCharacter
  {
    return new self();
  }

  static public function ability(): int
  {
    return random_int(3, 18);
  }

  static public function modifier(int $strength): int
  {
    return intdiv($strength, 2) - 5;
  }
}
