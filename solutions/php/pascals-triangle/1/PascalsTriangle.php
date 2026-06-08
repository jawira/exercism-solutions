<?php declare(strict_types=1);

function pascalsTriangleRows(int $rowCount): array
{
  $triangle = [];
  for ($i = 0; $i < $rowCount; $i++) {
    $row = array_fill(0, $i + 1, 0);
    $row[0] = $triangle[$i - 1][0] ?? 1;
    $row[array_key_last($row)] = array_first($row);
    for ($j = 1; $j <= count($row) - 2; $j++) {
      $row[$j] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
    }
    $triangle[$i] = $row;
  }
  return $triangle;
}
