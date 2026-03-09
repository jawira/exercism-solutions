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
        case move_top_left($whiteQueen) === move_top_left($blackQueen):
        case move_top_right($whiteQueen) === move_top_right($blackQueen):
        case move_bottom_left($whiteQueen) === move_bottom_left($blackQueen):
        case move_bottom_right($whiteQueen) === move_bottom_right($blackQueen):
            return true;
        default:
            return false;
    }
}

function move_top_left(array $queen): array
{
    while (0 < $queen[0] && 0 < $queen[1]) {
        $queen[0]--;
        $queen[1]--;
    }
    return $queen;
}

function move_bottom_right(array $queen): array
{
    while ($queen[0] < 7 && $queen[1] < 7) {
        $queen[0]++;
        $queen[1]++;
    }
    return $queen;
}

function move_bottom_left(array $queen): array
{
    while ($queen[0] < 7 && 0 < $queen[1]) {
        $queen[0]++;
        $queen[1]--;
    }
    return $queen;
}

function move_top_right(array $queen): array
{
    while (0 < $queen[0] && $queen[1] < 7) {
        $queen[0]--;
        $queen[1]++;
    }
    return $queen;
}
