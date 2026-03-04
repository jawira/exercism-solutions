<?php declare(strict_types=1);

function acronym(string $text): string
{
  $text = strtoupper($text);
  $text= str_replace('-',' ',$text);
  $text = str_word_count($text, 1);
  return array_reduce($text, fn($acronym, $word) => $acronym . $word[0], '');
}
