<?php declare(strict_types=1);

function isValid(string $number): bool
{
  if (strlen(filter_var($number, FILTER_SANITIZE_NUMBER_INT)) < 2) return false;
  $checkDigit = substr($number, -1);
  $number = substr($number, 0, -1);
  $double = false;
  $sum = 0;
  $position = strlen($number);
  while (--$position >= 0) {
    if ($number[$position] === ' ') continue;
    if (!ctype_digit($number[$position])) return false;
    $currentDigit = intval($number[$position]);
    if ($double = !$double) $currentDigit *= 2;
    if ($currentDigit > 9) $currentDigit -= 9;
    $sum += $currentDigit;
  }
  return intval($checkDigit) === ((10 - ($sum % 10)) % 10);
}
