<?php declare(strict_types=1);

enum State
{
    case Win;
    case Ongoing;
    case Draw;
}

class StateOfTicTacToe
{
    public function gameState(array $board): State
    {
        $xCount = $this->charCount($board, 'X');
        $oCount = $this->charCount($board, 'O');
        if (1 < ($xCount - $oCount)) {
            throw new RuntimeException('Wrong turn order: X went twice');
        }
        if (0 < ($oCount - $xCount)) {
            throw new RuntimeException('Wrong turn order: O started');
        }
        $xWon = $this->hasPlayerWon($board, 'X');
        $oWon = $this->hasPlayerWon($board, 'O');
        if ($xWon xor $oWon) {
            return State::Win;
        }
        if ($xWon && $oWon) {
            throw new RuntimeException('Impossible board: game should have ended after the game was won');
        }
        if (str_contains($board[0] . $board[1] . $board[2], ' ')) {
            return State::Ongoing;
        }
        return State::Draw;
    }

    private function hasPlayerWon(array $board, string $player): bool
    {
        for ($i = 0; $i < 3; $i++) {
            if ($board[$i][0] === $player && $board[$i][1] === $player && $board[$i][2] === $player) {
                return true;
            }
            if ($board[0][$i] === $player && $board[1][$i] === $player && $board[2][$i] === $player) {
                return true;
            }
        }
        if ($board[0][0] === $player && $board[1][1] === $player && $board[2][2] === $player) {
            return true;
        }
        if ($board[0][2] === $player && $board[1][1] === $player && $board[2][0] === $player) {
            return true;
        }
        return false;
    }

    private function charCount(array $board, string $player): int
    {
        $counting = count_chars($board[0] . $board[1] . $board[2]);
        return $counting[ord($player)] ?? 0;
    }
}
