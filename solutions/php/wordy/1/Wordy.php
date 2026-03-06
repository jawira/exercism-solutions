<?php declare(strict_types=1);

function calculate(string $input): int
{
    $input = str_replace(['What is ', '?', 'by '], '', $input);
    $elements = explode(' ', $input);
    $result = array_shift($elements);
    while ($elements) {
        $operator = array_shift($elements);
        $operand = array_shift($elements);
        is_numeric($operand) or throw new InvalidArgumentException;
        $result = match ($operator) {
            'plus' => $result + $operand,
            'minus' => $result - $operand,
            'multiplied' => $result * $operand,
            'divided' => $result / $operand,
            default => throw new InvalidArgumentException,
        };
    }
    return intval($result);
}
