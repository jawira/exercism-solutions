<?php declare(strict_types=1);

class Knapsack
{
  private array $combinations;
  private array $best = [['weight' => 0, 'value' => 0]];

  public function getMaximumValue(int $maximumWeight, array $items): int
  {
    $this->generateCombinations($items);
    $this->findBest($maximumWeight);
    return $this->reduce($this->best, 'value');
  }

  private function generateCombinations(array $items): void
  {
    $results = [[]];
    foreach ($items as $item) {
      foreach ($results as $combination) {
        $results[] = array_merge($combination, [$item]);
      }
    }
    $this->combinations = $results;
  }

  private function findBest(int $maximumWeight): void
  {
    $bestValue = 0;
    foreach ($this->combinations as $combination) {
      $weight = $this->reduce($combination, 'weight');
      $value = $this->reduce($combination, 'value');
      if ($bestValue < $value && $weight <= $maximumWeight) {
        $bestValue = $value;
        $this->best = $combination;
      }
    }
  }

  private function reduce(array $combination, string $key): int
  {
    return array_reduce($combination, fn($carry, $item) => $item[$key] + $carry, 0);
  }
}
