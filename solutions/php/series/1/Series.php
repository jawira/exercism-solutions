<?php declare(strict_types=1);

function slices(string $digits, int $series): array
{
    $series <= strlen($digits) && 0 < $series or throw new Exception;
    $result = [];
    for ($i = 0; $i <= strlen($digits) - $series; $i++) {
        $result[] = substr($digits, $i, $series);
    }
    return $result;
}
