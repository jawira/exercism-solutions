<?php declare(strict_types=1);

class EliudsEggs
{
  /** Solve using Bitwise operators. */
  public function eggCount(int $displayValue): int
  {
    for ($i = 0, $counter = 0; (2 ** $i) <= $displayValue; $i++) {
      if ($displayValue & (2 ** $i)) $counter++;
    }
    return $counter;
  }
}
