<?php declare(strict_types=1);

function find(int $needle, array $haystack): int
{
    $first = array_key_first($haystack);
    $last = array_key_last($haystack);
    do {
        $half = intdiv($first + $last, 2);
        if ($haystack[$half] === $needle) {
            return $half;
        }
        if ($haystack[$half] < $needle) {
            $first = ++$half;
        } else {
            $last = --$half;
        }
    } while ($first <= $last);
    return -1;
}
