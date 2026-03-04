<?php declare(strict_types=1);

class TwelveDays
{
  private string $verse = 'On the %s day of Christmas my true love gave to me: %s.';
  private array $ornidals = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth', 'eleventh', 'twelfth'];
  private array $gifts = ['a Partridge in a Pear Tree', 'two Turtle Doves', 'three French Hens', 'four Calling Birds', 'five Gold Rings', 'six Geese-a-Laying', 'seven Swans-a-Swimming', 'eight Maids-a-Milking', 'nine Ladies Dancing', 'ten Lords-a-Leaping', 'eleven Pipers Piping', 'twelve Drummers Drumming'];

  public function recite(int $start, int $end): string
  {
    $verses = [];
    $offset = $start - 1;
    $length = $end - $start + 1;
    $ornidals = array_slice($this->ornidals, $offset, $length, true);
    foreach ($ornidals as $key => $ornidal) {
      $gifts = array_slice($this->gifts, 0, $key + 1);
      if (count($gifts) > 1) {
        $gifts[0] = 'and ' . $gifts[0];
      }
      $gifts = array_reverse($gifts);
      $verses[] = sprintf($this->verse, $ornidal, implode(', ', $gifts));
    }
    return implode(PHP_EOL, $verses);
  }
}
