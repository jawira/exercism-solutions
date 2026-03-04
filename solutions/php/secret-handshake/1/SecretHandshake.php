<?php declare(strict_types=1);

class SecretHandshake
{
  public function commands(int $handshake): array
  {
    $actions = [];
    if ($handshake & 1) $actions[] = 'wink';
    if ($handshake & 2) $actions[] = 'double blink';
    if ($handshake & 4) $actions[] = 'close your eyes';
    if ($handshake & 8) $actions[] = 'jump';
    if ($handshake & 16) $actions = array_reverse($actions);
    return $actions;
  }
}
