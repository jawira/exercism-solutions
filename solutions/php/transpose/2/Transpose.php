<?php declare(strict_types=1);

function transpose(array $input): array
{
    if ($input === ['']) {
        return $input;
    }
    $maxLength = array_reduce($input, fn(int $carry, string $item) => max($carry, strlen($item)), 0);
    $input = array_map(fn(string $item) => str_pad($item, $maxLength), $input);
    $input = array_map(str_split(...), $input);
    $result = [];
    for ($i = 0; $i < $maxLength; $i++) {
        $result[] = implode('', array_column($input, $i));
    }
    end($result);
    $result[key($result)] = rtrim($result[key($result)]);

    return $result;
}
