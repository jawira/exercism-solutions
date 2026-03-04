<?php declare(strict_types=1);

function detectAnagrams(string $word, array $anagrams): array
{
  $anagrams = array_filter($anagrams, fn(string $anagram) => strcasecmp($word, $anagram) !== 0);
  $sortedAnagrams = array_map(fn(string $anagram) => sortWordLetters($anagram), $anagrams);
  $sortedAnagrams = array_combine($anagrams, $sortedAnagrams);
  $sortedWord = sortWordLetters($word);
  $sortedAnagrams = array_filter($sortedAnagrams, fn($sortedAnagram) => $sortedAnagram === $sortedWord);
  return array_keys($sortedAnagrams);
}

function sortWordLetters(string $word): string
{
  $word = strtolower($word);
  $letters = str_split($word);
  sort($letters);
  return implode('', $letters);
}


