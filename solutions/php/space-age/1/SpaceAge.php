<?php declare(strict_types=1);

class SpaceAge
{
    public function __construct(private int $seconds)
    {
    }

    public function earth(): float
    {
        return $this->toYear(1);
    }

    public function mercury(): float
    {
        return $this->toYear(0.2408467);
    }

    public function venus(): float
    {
        return $this->toYear(0.61519726);
    }

    public function mars(): float
    {
        return $this->toYear(1.8808158);
    }

    public function jupiter(): float
    {
        return $this->toYear(11.862615);
    }

    public function saturn(): float
    {
        return $this->toYear(29.447498);
    }

    public function uranus(): float
    {
        return $this->toYear(84.016846);
    }

    public function neptune(): float
    {
        return $this->toYear(164.79132);
    }

    private function toYear(float $orbitalPeriod): float
    {
        return (((($this->seconds / 60) / 60) / 24) / 365.25) / $orbitalPeriod;
    }
}
