<?php declare(strict_types=1);

function nucleotideCount(string $input): array
{
    $output = ['a' => 0, 'c' => 0, 't' => 0, 'g' => 0];
    for ($i = 0; $i < strlen($input); $i++) {
        in_array(strtolower($input[$i]), array_keys($output)) or throw new Exception();
        $output[strtolower($input[$i])]++;
    }
    return $output;
}
