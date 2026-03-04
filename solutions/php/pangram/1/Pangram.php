<?php declare(strict_types=1);
const ALPHABET_LENGTH = 26;
function isPangram(string $string): bool
{
  $string = strtolower($string);
  $letters = str_split($string);
  $letters = array_filter($letters, fn($letter) => ctype_lower($letter));
  $letters = array_unique($letters);
  return count($letters) === ALPHABET_LENGTH;
}
