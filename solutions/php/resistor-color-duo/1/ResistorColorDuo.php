<?php declare(strict_types=1);

class ResistorColorDuo
{
  public function getColorsValue(array $colors): int
  {
    $values = ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white'];
    return intval(array_search($colors[0], $values) . array_search($colors[1], $values));
  }
}
