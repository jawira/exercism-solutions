<?php declare(strict_types=1);

function score(float $xAxis, float $yAxis): int
{
    $distance = sqrt(($xAxis ** 2) + ($yAxis ** 2));
    return match (true) {
        $distance <= 1 => 10,
        $distance <= 5 => 5,
        $distance <= 10 => 1,
        default => 0,
    };

    throw new \BadFunctionCallException("Please implement the __FUNCTION__ function!");
}
