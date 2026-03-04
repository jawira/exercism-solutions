<?php declare(strict_types=1);

function winner(array $lines): ?string
{
    $board = array_map(str_split(...), $lines);
    $blackWins = left_to_right($board, 'X');
    $whiteWins = top_to_bottom($board, 'O');
    if ($whiteWins xor $blackWins) {
        return $blackWins ? 'black' : 'white';
    }

    return '';
}

function top_to_bottom(array $board, string $player): bool
{
    // Start positions
    $startPositions = [];
    foreach (reset($board) as $col => $value) {
        if ($value === $player) {
            $startPositions[] = [0, $col];
        }
    }
    // Goal positions
    $goalPositions = [];
    foreach (end($board) as $position => $value) {
        if ($value === $player) {
            $goalPositions[] = [array_key_last($board), $position];
        }
    }
    return solve($board, $player, $startPositions, $goalPositions);
}

function left_to_right(array $board, string $player): bool
{
    // Start positions
    $startPositions = [];
    foreach (array_keys($board) as $row) {
        if ($board[$row][$row] === $player) {
            $startPositions[] = [$row, $row];
        }
    }
    // Goal positions
    $goalPositions = [];
    foreach ($board as $row => $values) {
        if (end($values) === $player) {
            $goalPositions[] = [$row, array_key_last($values)];
        }
    }
    return solve($board, $player, $startPositions, $goalPositions);
}

function solve(array $board, string $player, array $toVisit, array $goalPositions): bool
{
    $visited = [];
    // Start search
    while (!empty($toVisit)) {
        $current = array_shift($toVisit);
        // Is goal?
        if (in_array($current, $goalPositions)) {
            return true;
        }
        // Next positions
        foreach (get_neighbors($board, $player, $current) as $candidate) {
            $alreadyInVisited = in_array($candidate, $visited);
            $alreadyInToVisit = in_array($candidate, $toVisit);
            if ($alreadyInVisited || $alreadyInToVisit) {
                continue;
            }
            $toVisit[] = $candidate;
        }
        $visited[] = $current;
    }
    return false;
}

function get_neighbors(array $board, string $player, array $position): array
{
    $neighbors = [];
    foreach ([$position[0] - 1, $position[0] + 1] as $row) {
        foreach ([$position[1] - 1, $position[1] + 1] as $col) {
            if (($board[$row][$col] ?? '-') === $player) {
                $neighbors[] = [$row, $col];
            }
        }
    }
    foreach ([$position[1] - 2, $position[1] + 2] as $col) {
        if (($board[$position[0]][$col] ?? '-') === $player) {
            $neighbors[] = [$position[0], $col];
        }
    }
    return $neighbors;
}
