<?php declare(strict_types=1);

function diamond(string $letter): array
{
    $diamond = [];
    $range = range('A', $letter);
    for ($position = 0; $position < count($range); $position++) {
        $diamond[] = diamond_line($letter, $range, $position);
    }
    for ($position = count($range) - 2; 0 <= $position; $position--) {
        $diamond[] = diamond_line($letter, $range, $position);
    }
    return $diamond;
}

function diamond_line(string $letter, array $range, int $position): string
{
    $length = (array_search($letter, $range) + 1) * 2 - 1;
    $line = str_pad('', $length);
    $first = intdiv($length, 2) - $position;
    $second = intdiv($length, 2) + $position;
    $line[$first] = $line[$second] = $range[$position];
    return $line;
}