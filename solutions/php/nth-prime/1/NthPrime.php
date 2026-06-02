<?php declare(strict_types=1);

function prime(int $number): int
{
    0 < $number or throw new Exception();
    $position = 0;
    for ($i = 2; $position <= $number; $i++) {
        if (is_prime($i)) {
            $position++;
        } else {
            continue;
        }
        if ($position === $number) {
            return $i;
        }
    }
    return $i;
}

function is_prime(int $number): bool
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
