<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class FlowerField
{
    private array $garden;

    public function __construct(array $garden)
    {
        $this->garden = array_map(fn(string $row) => str_replace(' ', '0', $row), $garden);
        $this->garden = array_map(fn(string $row) => str_split($row), $this->garden);
    }

    public function annotate(): array
    {
        for ($i = 0; $i < count($this->garden); $i++) {
            for ($j = 0; $j < count($this->garden[0]); $j++) {
                if ($this->garden[$i][$j] === '*') {
                    continue;
                }
                for ($k = $i - 1; $k <= $i + 1; $k++) {
                    for ($l = $j - 1; $l <= $j + 1; $l++) {
                        if (($this->garden[$k][$l] ?? 'x') === '*') {
                            $this->garden[$i][$j]++;
                        }
                    }
                }
            }
        }

        $result = array_map(fn(array $row) => implode($row), $this->garden);
        return array_map(fn(string $row) => str_replace('0', ' ', $row), $result);
    }
}
