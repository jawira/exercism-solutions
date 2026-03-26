<?php declare(strict_types=1);

function transpose(array $input): array
{
    $output = [''];
    if (empty($input)) {
        return [];
    }
    foreach ($input as $key => $line) {
        for ($i = 0; $i < strlen($line); $i++) {
            $output[$i][$key] = $line[$i];
        }
    }
    return $output;
}
