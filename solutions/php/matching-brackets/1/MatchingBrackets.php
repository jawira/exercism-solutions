<?php declare(strict_types=1);

function brackets_match(string $input): bool
{
    $input = preg_replace('#[^\[\]{}()]#', '', $input);
    do {
        $input = str_replace(['[]', '{}', '()'], '', $input);
    } while (array_filter(['[]', '{}', '()'], fn($v) => str_contains($input, $v)));
    return strlen($input) === 0;
}
