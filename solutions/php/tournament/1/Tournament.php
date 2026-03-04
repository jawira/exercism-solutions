<?php declare(strict_types=1);

class Tournament
{
  private array $teams = [];

  public function tally(string $scores): string
  {
    if ($scores !== '') {
      $this->readScores($scores);
    }
    return $this->generateTally();
  }

  private function addWin(string $team): self
  {
    $this->teams[$team]['mp']++;
    $this->teams[$team]['w']++;
    $this->teams[$team]['pt'] += 3;
    return $this;
  }

  private function addLoss(string $team): self
  {
    $this->teams[$team]['mp']++;
    $this->teams[$team]['l']++;
    return $this;
  }

  private function addDraw(string $team): self
  {
    $this->teams[$team]['mp']++;
    $this->teams[$team]['d']++;
    $this->teams[$team]['pt']++;
    return $this;
  }

  private function createTeam(string $team): self
  {
    if (!array_key_exists($team, $this->teams)) {
      $this->teams[$team] = ['mp' => 0, 'w' => 0, 'd' => 0, 'l' => 0, 'pt' => 0];
    }
    return $this;
  }

  private function readScores(string $scores): void
  {
    foreach (explode("\n", $scores) as $score) {
      [$first, $second, $result] = explode(';', $score);
      $this->createTeam($first)->createTeam($second);
      switch ($result) {
        case 'win':
          $this->addWin($first)->addLoss($second);
          break;
        case 'loss':
          $this->addWin($second)->addLoss($first);
          break;
        default:
          $this->addDraw($first)->addDraw($second);
          break;
      }
    }
  }

  private function generateTally(): string
  {
    $tally = ['Team                           | MP |  W |  D |  L |  P'];
    ksort($this->teams);
    uasort($this->teams, fn($a, $b): int => $b['pt'] <=> $a['pt']);
    foreach ($this->teams as $name => $t) {
      $tally[] = sprintf('%-31s| %2s | %2s | %2s | %2s | %2s', $name, $t['mp'], $t['w'], $t['d'], $t['l'], $t['pt']);
    }
    return implode("\n", $tally);
  }
}
