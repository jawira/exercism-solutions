<?php

class LuckyNumbers
{
  public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
  {
    $reducer = fn($carry, $digit) => $carry * 10 + $digit;
    $firstDigits = array_reduce($digitsOfNumber1, $reducer, 0);
    $secondDigits = array_reduce($digitsOfNumber2, $reducer, 0);
    return $firstDigits + $secondDigits;
  }

  public function isPalindrome(int $number): bool
  {
    return strval($number) === strrev(strval($number));
  }

  public function validate(string $input): string
  {
    if ($input === '') {
      return 'Required field';
    }
    if (intval($input) <= 0) {
      return 'Must be a whole number larger than 0';
    }
    return '';
  }
}
