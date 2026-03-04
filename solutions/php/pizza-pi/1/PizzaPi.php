<?php

class PizzaPi
{
  public function calculateDoughRequirement(int $pizzas, int $persons): int
  {
    return $pizzas * (($persons * 20) + 200);
  }

  public function calculateSauceRequirement(int $pizzas, int $canContent): float
  {
    return $pizzas * 125 / $canContent;
  }

  public function calculateCheeseCubeCoverage(int $cheeseDimension, float $thickness, int $diameter): int
  {
    return intval(($cheeseDimension ** 3) / ($thickness * M_PI * $diameter));
  }

  public function calculateLeftOverSlices(int $pizzas, int $friends): int
  {
    return ($pizzas * 8) % $friends;
  }
}
