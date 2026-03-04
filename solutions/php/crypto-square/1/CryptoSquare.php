<?php declare(strict_types=1);

function crypto_square(string $plaintext): string
{
    $plaintext = preg_replace('#\W#', '', mb_strtolower($plaintext));
    if (empty($plaintext)) {
        return '';
    }
    $chunks = (int)ceil(sqrt(strlen($plaintext)));
    $chunkLength = (int)ceil(strlen($plaintext) / $chunks);
    $plaintext = str_pad($plaintext, $chunkLength * $chunks);
    $output = '';
    for ($i = 0; $i < $chunks; $i++) {
        $output .= $i ? ' ' : '';
        for ($j = 0; $j < $chunkLength; $j++) {
            $output .= $plaintext[$i + ($j * $chunks)];
        }
    }
    return $output;
}
