<?php declare(strict_types=1);

function score(string $word): int
{
    $score = 0;
    for ($i = 0; $i < strlen($word); $i++) {
        $score += match (strtoupper($word[$i])) {
            'A', 'E', 'I', 'O', 'U', 'L', 'N', 'R', 'S', 'T' => 1,
            'D', 'G' => 2,
            'B', 'C', 'M', 'P' => 3,
            'F', 'H', 'V', 'W', 'Y' => 4,
            'K' => 5,
            'J', 'X' => 8,
            'Q', 'Z' => 10,
        };
    }
    return $score;
}
