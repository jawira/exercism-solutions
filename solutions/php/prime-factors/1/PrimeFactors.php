<?php declare(strict_types=1);

function factors(int $number): array
{
  $factors = [];
  for ($divisor = 2; $divisor <= $number; $divisor++) {
    if ($number % $divisor !== 0) {
      continue;
    }
    $factors[] = $divisor;
    $number /= $divisor;
    $divisor = 1;
  }
  return $factors;
}
