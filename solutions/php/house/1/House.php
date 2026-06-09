<?php declare(strict_types=1);

class House
{
  private array $elements = [
    ['', 'horse and the hound and the horn'],
    ['belonged to', 'farmer sowing his corn'],
    ['kept', 'rooster that crowed in the morn'],
    ['woke', 'priest all shaven and shorn'],
    ['married', 'man all tattered and torn'],
    ['kissed', 'maiden all forlorn'],
    ['milked', 'cow with the crumpled horn'],
    ['tossed', 'dog'],
    ['worried', 'cat'],
    ['killed', 'rat'],
    ['ate', 'malt'],
    ['lay in', 'house that Jack built.'],
  ];

  public function verse(int $verseNumber): array
  {
    $lyrics = [];
    $slice = array_slice($this->elements, -$verseNumber);
    foreach ($slice as $key => $element) {
      $template = $key === 0 ? 'This is the %s' : 'that %s the %s';
      $values = $key === 0 ? array_slice($element, -1) : $element;
      $lyrics[] = vsprintf($template, $values);
    }
    return $lyrics;
  }

  public function verses(int $start, int $end): array
  {
    $verses = [];
    for ($i = $start; $i <= $end; $i++) {
      $verse = $this->verse($i);
      if ($i !== $end) {
        $verse[] = '';
      }
      $verses[] = $verse;
    }
    return array_merge(...$verses);
  }
}
