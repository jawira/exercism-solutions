<?php declare(strict_types=1);

class KindergartenGarden
{
    private array $students = ['Alice' => 0, 'Bob' => 2, 'Charlie' => 4, 'David' => 6, 'Eve' => 8, 'Fred' => 10, 'Ginny' => 12, 'Harriet' => 14, 'Ileana' => 16, 'Joseph' => 18, 'Kincaid' => 20, 'Larry' => 22];
    private array $plants = ['G' => 'grass', 'C' => 'clover', 'R' => 'radishes', 'V' => 'violets',];
    private array $rows;

    public function __construct(string $diagram)
    {
        $this->rows = explode(PHP_EOL, $diagram);
    }

    public function plants(string $student): array
    {
        $plants = [];
        $position = $this->students[$student];
        foreach ($this->rows as $row) {
            $plants[] = $this->plants[$row[$position]];
            $plants[] = $this->plants[$row[$position + 1]];
        }
        return $plants;
    }
}
