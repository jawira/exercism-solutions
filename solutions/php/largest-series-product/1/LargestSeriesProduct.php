<?php declare(strict_types=1);

class Series
{
  public function __construct(private string $input)
  {
  }

  public function largestProduct(int $span): int
  {
    $length = strlen($this->input);
    $span <= $length or throw new InvalidArgumentException();
    if ($length === 0 || $span === 0) {
      return 1;
    }
    $maxProduct = 0;
    for ($i = 0; $i + $span <= $length; $i++) {
      $series = substr($this->input, $i, $span);
      ctype_digit($series) or throw new InvalidArgumentException();
      $digits = str_split($series);
      $product = array_product($digits);
      if ($product > $maxProduct) {
        $maxProduct = $product;
      }
    }
    return $maxProduct;
  }
}
