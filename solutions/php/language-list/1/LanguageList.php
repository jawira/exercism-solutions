<?php declare(strict_types=1);

function language_list(string ...$languages): array
{
  return $languages;
}

function add_to_language_list(array $languages, string $newLanguage): array
{
  $languages[] = $newLanguage;
  return $languages;
}

function prune_language_list(array $languages): array
{
  array_shift($languages);
  return $languages;
}

function current_language(array $languages): string
{
  return $languages[array_key_first($languages)];
}

function language_list_length(array $languages): int
{
  return count($languages);
}