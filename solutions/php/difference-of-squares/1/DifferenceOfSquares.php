<?php declare(strict_types=1);

function squareOfSum(int $max): int
{
  $numbers = range(1, $max);
  return array_sum($numbers) ** 2;
}

function sumOfSquares(int $max): int
{
  $numbers = range(1, $max);
  $numbers = array_map(fn($number) => $number ** 2, $numbers);
  return array_sum($numbers);
}

function difference(int $max): int
{
  return squareOfSum($max) - sumOfSquares($max);
}
