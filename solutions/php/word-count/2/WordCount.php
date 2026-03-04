<?php declare(strict_types=1);

function wordCount(string $words): array
{
  $words = \strtolower($words);
  $words = \str_word_count($words, 1,'0123456789');
  return \array_count_values($words);
}
