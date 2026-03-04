<?php declare(strict_types=1);

function steps(int $number): int
{
    $number > 0 or throw new InvalidArgumentException('Only positive integers are allowed');
    $count = 0;
    while ($number !== 1) {
        $number = ($number % 2 === 0) ? ($number / 2) : ($number * 3) + 1;
        $count++;
    }
    return $count;
}
