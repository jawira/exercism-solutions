<?php declare(strict_types=1);

function isLeap(int $year): bool
{
    return match (true) {
        $year % 100 === 0 => $year % 400 === 0,
        $year % 4 === 0 => true,
        default => false,
    };
}
