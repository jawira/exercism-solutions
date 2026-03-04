<?php declare(strict_types=1);

class RotationalCipher
{
  public function rotate(string $text, int $shift): string
  {
    $result = '';
    foreach (str_split($text) as $char) {
      $result .= match (true) {
        ctype_lower($char) => $this->rotateChar($char, $shift, 'a'),
        ctype_upper($char) => $this->rotateChar($char, $shift, 'A'),
        default => $char,
      };
    }
    return $result;
  }

  public function rotateChar($char, $shift, $start): string
  {
    $correctedChar = ord($char) - ord($start);
    $correctedShift = $shift % 26;
    $codepoint = (($correctedChar + $correctedShift) % 26);
    return chr($codepoint + ord($start));
  }
}
