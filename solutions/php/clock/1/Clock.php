<?php declare(strict_types=1);

final class Clock implements Stringable
{
    private int $hours = 0;
    private int $minutes = 0;

    public function __construct(int $hours, int $minutes = 0)
    {
        $this->addHours($hours);
        $this->add($minutes);
    }

    private function addHours(int $hours): void
    {
        $this->hours = ($this->hours + $hours) % 24;
        if ($this->hours < 0) {
            $this->hours += 24;
        }
    }

    public function add(int $minutes): self
    {
        $this->addHours(intdiv($this->minutes + $minutes, 60));
        $this->minutes = ($this->minutes + $minutes) % 60;
        if ($this->minutes < 0) {
            $this->minutes += 60;
            $this->addHours(-1);
        }

        return $this;
    }

    public function sub(int $minutes): self
    {
        $this->add(-$minutes);
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('%02d:%02d', $this->hours, $this->minutes);
    }
}
