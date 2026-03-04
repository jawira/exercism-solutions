<?php declare(strict_types=1);

function rebase(int $fromBase, array $digits, int $toBase): array
{
    2 <= $fromBase or throw new InvalidArgumentException('input base must be >= 2');
    2 <= $toBase or throw new InvalidArgumentException('output base must be >= 2');
    array_map(fn($value) => 0 <= $value or throw new InvalidArgumentException('all digits must satisfy 0 <= d < input base'), $digits);
    array_map(fn($value) => $value < $fromBase or throw new InvalidArgumentException('all digits must satisfy 0 <= d < input base'), $digits);
    $digits = array_map(fn($value, $index) => $value * ($fromBase ** $index), array_reverse($digits), array_keys($digits));
    $decimalValue = array_sum($digits);
    $output = [];
    do {
        array_unshift($output, $decimalValue % $toBase);
        $decimalValue = intdiv($decimalValue, $toBase);
    } while ($decimalValue > 0);

    return $output;
}
