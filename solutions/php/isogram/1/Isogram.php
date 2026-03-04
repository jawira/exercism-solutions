<?php declare(strict_types=1);

function isIsogram(string $word): bool
{
  $letters = str_split($word);
  $letters = array_filter($letters, fn($letter) => ctype_alpha($letter));
  $letters = array_map(fn($letter) => strtolower($letter), $letters);
  return count($letters) === count(array_unique($letters));
}
