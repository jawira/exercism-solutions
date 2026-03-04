<?php declare(strict_types=1);

class GradeSchool
{
  private array $roster = [1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => []];

  public function add(string $name, int $grade): bool
  {
    foreach ($this->roster as $students) {
      if (in_array($name, $students)) {
        return false;
      }
    }
    $this->roster[$grade][] = $name;
    return true;
  }

  public function grade(int $grade): array
  {
    sort($this->roster[$grade]);
    return $this->roster[$grade];
  }

  public function roster(): array
  {
    $roster = [];
    foreach ($this->roster as $students) {
      sort($students);
      $roster = array_merge($roster, $students);
    }
    return $roster;
  }
}
