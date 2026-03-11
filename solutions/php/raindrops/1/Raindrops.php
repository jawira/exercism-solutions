<?php declare(strict_types=1);

function raindrops(int $number): string
{
    $result = '';
    if ($number % 3 === 0) {
        $result .= 'Pling';
    }
    if ($number % 5 === 0) {
        $result .= 'Plang';
    }
    if ($number % 7 === 0) {
        $result .= 'Plong';
    }
    return empty($result) ? strval($number) : $result;
}
