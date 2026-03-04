<?php declare(strict_types=1);

function format(string $name, int $number): string
{
  $indicator = match ($number % 10) {
    1 => 'st',
    2 => 'nd',
    3 => 'rd',
    default => 'th',
  };
  if (in_array($number % 100, [11, 12, 13])) {
    $indicator = 'th';
  }
  return "$name, you are the $number$indicator customer we serve today. Thank you!";
}
