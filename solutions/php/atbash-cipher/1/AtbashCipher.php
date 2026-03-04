<?php declare(strict_types=1);

const PLAIN = 'abcdefghijklmnopqrstuvwxyz123';
const CIPHER = 'zyxwvutsrqponmlkjihgfedcba123';

function encode(string $text): string
{
  return atbash_cipher($text, CIPHER, PLAIN, true);
}

function decode(string $text): string
{
  return atbash_cipher($text, PLAIN, CIPHER, false);
}

function atbash_cipher(string $text, string $source, string $target, bool $split): string
{
  $newText = '';
  for ($i = 0; $i < strlen($text); $i++) {
    if (in_array($text[$i], [' ', ',', '.'])) continue;
    $position = strpos($source, strtolower($text[$i]));
    $newText .= $target[$position];
  }
  return $split ? implode(' ', str_split($newText, 5)) : $newText;
}