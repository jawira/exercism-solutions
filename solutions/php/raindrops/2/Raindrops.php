<?php declare(strict_types=1);

function raindrops(int $number): string
{
    $result = $number % 3 === 0 ? 'Pling' : '';
    $result .= $number % 5 === 0 ? 'Plang' : '';
    $result .= $number % 7 === 0 ? 'Plong' : '';
    return empty($result) ? strval($number) : $result;
}
