<?php

declare(strict_types=1);

class Yacht
{
    public function score(array $rolls, string $category): int
    {
        $arrayCountValues = array_count_values($rolls);
        return match ($category) {
            'ones' => $this->anyCombination($arrayCountValues, 1),
            'twos' => $this->anyCombination($arrayCountValues, 2),
            'threes' => $this->anyCombination($arrayCountValues, 3),
            'fours' => $this->anyCombination($arrayCountValues, 4),
            'fives' => $this->anyCombination($arrayCountValues, 5),
            'sixes' => $this->anyCombination($arrayCountValues, 6),
            'full house' => $this->fullHouse($arrayCountValues),
            'four of a kind' => $this->fourOfAKind($arrayCountValues),
            'little straight' => $this->littleStraight($rolls),
            'big straight' => $this->bigStraight($rolls),
            'choice' => $this->choice($rolls),
            'yacht' => $this->yacht($arrayCountValues),
        };
    }

    private function anyCombination(array $arrayCountValues, int $digit): int
    {
        return ($arrayCountValues[$digit] ?? 0) * $digit;
    }

    private function fullHouse(array $arrayCountValues): int
    {
        $isFullHouse = in_array(2, $arrayCountValues) && in_array(3, $arrayCountValues);
        if (!$isFullHouse) {
            return 0;
        }
        return array_reduce(array_keys($arrayCountValues), fn(int $carry, int $key): int => $carry + ($arrayCountValues[$key] * $key), 0);
    }

    private function fourOfAKind(array $arrayCountValues): int
    {
        $key = array_search(5, $arrayCountValues);
        if (is_int($key)) {
            $arrayCountValues[$key]--;
        }
        $key = array_search(4, $arrayCountValues);
        if (!is_int($key)) {
            return 0;
        }
        return $arrayCountValues[$key] * $key;
    }

    private function littleStraight(array $rolls): int
    {
        $values = array_values($rolls);
        sort($values);
        $isLittleStraight = $values === [1, 2, 3, 4, 5];
        if (!$isLittleStraight) {
            return 0;
        }
        return 30;
    }

    private function bigStraight(array $rolls): int
    {
        $values = array_values($rolls);
        sort($values);
        $isBigStraight = $values === [2, 3, 4, 5, 6];
        if (!$isBigStraight) {
            return 0;
        }
        return 30;
    }

    private function choice(array $rolls): int
    {
        return array_sum($rolls);
    }

    private function yacht(array $arrayCountValues): int
    {
        return in_array(5, $arrayCountValues) ? 50 : 0;
    }
}
