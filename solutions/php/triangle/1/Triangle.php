<?php declare(strict_types=1);

class Triangle
{
    private array $sides;

    public function __construct(int|float $a, int|float $b, int|float $c)
    {
        $this->sides = [$a, $b, $c];
        sort($this->sides);
        0 < $this->sides[2] or throw new Exception();
        $this->sides[0] + $this->sides[1] >= $this->sides[2] or throw new Exception();
    }

    public function kind(): string
    {
        $firstEquality = $this->sides[0] === $this->sides[1];
        $secondEquality = $this->sides[1] === $this->sides[2];
        return match (true) {
            $firstEquality && $secondEquality => 'equilateral',
            $firstEquality || $secondEquality => 'isosceles',
            default => 'scalene',
        };
    }
}
