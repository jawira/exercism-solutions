<?php declare(strict_types=1);

function maskify(string $cc): string
{
    if (strlen($cc) < 6) {
        return $cc;
    }
    for ($i = 1; $i < strlen($cc); $i++) {
        if (ctype_digit($cc[$i])) {
            $cc[$i] = '#';
        }
        if (substr_count($cc, '#') === 7) {
            break;
        }
    }
    return $cc;
}
