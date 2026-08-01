<?php declare(strict_types=1);

function saddlePoints(array $matrix): array
{
  $trees = [];
  foreach ($matrix as $row => $matrixRow) {
    foreach ($matrixRow as $column => $item) {
      $isTallerInRow = \max($matrixRow) === $item;
      $isShorterInColumn = \min(\array_column($matrix, $column)) === $item;
      if ($isTallerInRow && $isShorterInColumn) {
        $trees[] = ['row' => $row + 1, 'column' => $column + 1];
      }
    }
  }
  return $trees;
}

