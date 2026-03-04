<?php declare(strict_types=1);

function getAllColors(): array
{
  return ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white'];
}

function colorCode(string $color): int
{
  return array_find_key(getAllColors(), fn($c): bool => $c === $color);
}
