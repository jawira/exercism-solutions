<?php declare(strict_types=1);

class ResistorColorTrio
{
  private const array COLORS = ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white'];
  private const array UNITS = ['ohms', 'kiloohms', 'megaohms', 'gigaohms'];

  public function label(array $colors): string
  {
    $digits = ($this->getDigit($colors[0]) * 10) + $this->getDigit($colors[1]);
    $multiplier = $this->getDigit($colors[2]);
    return $this->generateLabel($digits, $multiplier);
  }

  private function getDigit(string $color): int
  {
    return array_search($color, self::COLORS, true);
  }

  private function generateLabel(int $digits, int $multiplier): string
  {
    $value = $digits * pow(10, $multiplier);
    for ($i = 0; $value >= 1000; $i++) {
      $value = intdiv($value, 1000);
    }
    $unit = self::UNITS[$i];
    return "$value $unit";
  }
}
