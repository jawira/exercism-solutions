<?php

class HighSchoolSweetheart
{
  public function firstLetter(string $name): string
  {
    $name = trim($name);
    return $name[0];
  }

  public function initial(string $name): string
  {
    return $this->firstLetter(strtoupper($name)) . '.';
  }

  public function initials(string $name): string
  {
    $names = str_word_count($name, 1);
    return sprintf("%s %s", $this->initial($names[0]), $this->initial($names[1]));
  }

  public function pair(string $sweetheart_a, string $sweetheart_b): string
  {
    $initials_a = $this->initials($sweetheart_a);
    $initials_b = $this->initials($sweetheart_b);
    return <<<HEART
           ******       ******
         **      **   **      **
       **         ** **         **
      **            *            **
      **                         **
      **     $initials_a  +  $initials_b     **
       **                       **
         **                   **
           **               **
             **           **
               **       **
                 **   **
                   ***
                    *
      HEART;
  }
}
