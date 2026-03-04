<?php

declare(strict_types=1);

function transform(array $input): array
{
    $output = [];
    foreach ($input as $key => $letters) {
        foreach ($letters as $letter) {
            $output[strtolower($letter)] = $key;
        }
    }
    ksort($output);
    return $output;
}
