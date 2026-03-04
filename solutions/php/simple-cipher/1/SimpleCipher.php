<?php declare(strict_types=1);

class SimpleCipher
{
  public readonly string $key;
  private const int COUNT = 26;
  private const int CIPHER_MAX_LENGTH = 100;
  private const array ALPHABET = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

  public function __construct(?string $key = null)
  {
    if (is_null($key)) {
      $key = $this->randomCipher();
    }
    ctype_lower($key) or throw new InvalidArgumentException();
    $this->key = $key;
  }

  public function encode(string $plainText): string
  {
    $computeIndex = fn($plainIndex, $keyIndex): int => $plainIndex + $keyIndex;
    return $this->transform($plainText, $computeIndex);
  }

  public function decode(string $cipherText): string
  {
    $computeIndex = fn($plainIndex, $keyIndex): int => $plainIndex - $keyIndex;
    return $this->transform($cipherText, $computeIndex);
  }

  private function transform(string $text, callable $computeIndex): string
  {
    $newText = '';
    $length = strlen($text);
    for ($i = 0; $i < $length; $i++) {
      $plainIndex = array_search($text[$i], self::ALPHABET);
      $keyIndex = array_search($this->key[$i], self::ALPHABET);
      $index = ($computeIndex($plainIndex, $keyIndex) % self::COUNT + self::COUNT) % self::COUNT;
      $newText .= self::ALPHABET[$index];
    }
    return $newText;
  }

  private function randomCipher(): string
  {
    $cipher = '';
    do {
      $index = array_rand(self::ALPHABET);
      $cipher .= self::ALPHABET[$index];
    } while (strlen($cipher) < self::CIPHER_MAX_LENGTH);
    return $cipher;
  }
}
