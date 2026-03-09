<?php declare(strict_types=1);

function placeQueen(int $xCoordinate, int $yCoordinate): bool
{
    0 <= $xCoordinate && 0 <= $yCoordinate or throw new InvalidArgumentException('The rank and file numbers must be positive.');
    $xCoordinate <= 7 && $yCoordinate <= 7 or throw new InvalidArgumentException('The position must be on a standard size chess board.');
    return true;
}

function canAttack(array $whiteQueen, array $blackQueen): bool
{
    switch (true) {
        case $whiteQueen[0] === $blackQueen[0]:
        case $whiteQueen[1] === $blackQueen[1]:
        case abs($whiteQueen[0] - $blackQueen[0]) === abs($whiteQueen[1] - $blackQueen[1]):
            return true;
        default:
            return false;
    }
}

