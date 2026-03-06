<?php declare(strict_types=1);

function isArmstrongNumber(int $number): bool
{
    $original = $number;
    $result = 0;
    $length = strlen(strval($original));
    do {
        $result += ($number % 10) ** $length;
    } while ($number = intdiv($number, 10));
    return $result === $original;
}
