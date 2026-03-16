<?php declare(strict_types=1);

function sumOfMultiples(int $number, array $multiples): int
{
    $values = [];
    foreach (array_filter($multiples) as $multiple) {
        for ($i = $multiple; $i < $number; $i += $multiple) {
            $values[$i] = $i;
        }
    }
    return array_sum($values);
}
