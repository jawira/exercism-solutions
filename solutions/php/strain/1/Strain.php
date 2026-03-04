<?php declare(strict_types=1);

class Strain
{
  public function keep(array $list, callable $predicate): array
  {
    return $this->process($list, $predicate, __FUNCTION__);
  }

  public function discard(array $list, callable $predicate): array
  {
    return $this->process($list, $predicate, __FUNCTION__);
  }

  /**
   * Not using array_filter on purpose.
   */
  private function process(array $list, callable $predicate, string $operation): array
  {
    $newList = ['keep' => [], 'discard' => []];
    foreach ($list as $item) {
      if ($predicate($item)) {
        $newList['keep'][] = $item;
      } else {
        $newList['discard'][] = $item;
      }
    }
    return $newList[$operation];
  }
}
