<?php declare(strict_types=1);

class IsbnVerifier
{
  public function isValid(string $isbn): bool
  {
    $result = 0;
    $digits = array_reverse(array_values(array_filter(str_split($isbn), fn($d) => $d !== '-')));
    if (count($digits) !== 10) return false;
    if ($digits[0] === 'X') $digits[0] = 10;
    foreach ($digits as $key => $digit) {
      if (!is_numeric($digit)) return false;
      $result += ($key + 1) * intval($digit);
    }
    return $result % 11 === 0;
  }
}
