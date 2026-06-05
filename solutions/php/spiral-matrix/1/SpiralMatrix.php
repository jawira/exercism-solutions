<?php declare(strict_types=1);

class SpiralMatrix
{
    public function draw(int $n): array
    {
        $count = 0;
        $rowStart = $columnStart = 0;
        $rowEnd = $columnEnd = ($n - 1);
        $matrix = array_fill(0, $n, array_fill(0, $n, 0));
        do {
            for ($column = $columnStart; $column <= $columnEnd; $column++) {
                $matrix[$rowStart][$column] = ++$count;
            }
            $rowStart++;
            for ($row = $rowStart; $row <= $rowEnd; $row++) {
                $matrix[$row][$columnEnd] = ++$count;
            }
            $columnEnd--;
            for ($column = $columnEnd; $columnStart <= $column; $column--) {
                $matrix[$rowEnd][$column] = ++$count;
            }
            $rowEnd--;
            for ($row = $rowEnd; $rowStart <= $row; $row--) {
                $matrix[$row][$columnStart] = ++$count;
            }
            $columnStart++;
        } while ($count < ($n**2));
        return $matrix;
    }
}
