<?php declare(strict_types=1);

class Proverb
{

  public function recite(array $pieces): array
  {
    $verses = [];
    for ($i = 0; $i < count($pieces) && array_key_exists($i + 1, $pieces); $i++) {
      $verses[] = sprintf('For want of a %s the %s was lost.', $pieces[$i], $pieces[$i + 1]);
    }
    if (array_key_exists(0, $pieces)) {
      $verses[] = sprintf("And all for the want of a %s.", $pieces[0]);
    }
    return $verses;
  }
}
