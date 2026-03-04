<?php declare(strict_types=1);

class Bob
{
  public function respondTo(string $str): string
  {
    return match (true) {

      $this->isQuestion($str) && $this->isYelling($str) && !$this->isOnlyDigits($str) => "Calm down, I know what I'm doing!",
      $this->isQuestion($str) => 'Sure.',
      $this->isYelling($str) && !$this->isOnlyDigits($str) => 'Whoa, chill out!',
      $this->isSilence($str) => 'Fine. Be that way!',
      default => 'Whatever.',
    };
  }

  private function isQuestion(string $str): bool
  {
    return str_ends_with(rtrim($str), '?');
  }

  private function isYelling(string $str): bool
  {
    return preg_match("#\A[\p{Lu},%^*!@\#$('\s\d]+[?!\s]*\z#", $str) === 1;
  }

  private function isOnlyDigits(string $str): bool
  {
    return preg_match("#\A[\d,'\s]+[?!\s]*\z#", $str) === 1;
  }

  private function isSilence(string $str)
  {
    return empty(trim($str));
  }

}
