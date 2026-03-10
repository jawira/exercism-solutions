<?php declare(strict_types=1);

function meetup_day(int $year, int $month, string $which, string $weekday): DateTimeImmutable
{
    $start = $which === 'teenth' ? 13 : 1;
    $days = [];
    while (checkdate($month, $start, $year)) {
        $dateTime = new DateTimeImmutable($year . '-' . $month . '-' . $start++);
        if ($dateTime->format('l') === $weekday) {
            $days[] = $dateTime;
        }
    }
    return match ($which) {
        'first', 'teenth' => $days[0],
        'second' => $days[1],
        'third' => $days[2],
        'fourth' => $days[3],
        'last' => end($days),
    };
}
