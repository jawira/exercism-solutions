<?php

class AnnalynsInfiltration
{
  public function canFastAttack($is_knight_awake): bool
  {
    return !$is_knight_awake;
  }

  public function canSpy(bool $is_knight_awake, bool $is_archer_awake, bool $is_prisoner_awake): bool
  {
    return $is_knight_awake || $is_archer_awake || $is_prisoner_awake;
  }

  public function canSignal(bool $is_archer_awake, bool $is_prisoner_awake): bool
  {
    return !$is_archer_awake && $is_prisoner_awake;
  }

  public function canLiberate(bool $is_knight_awake, bool $is_archer_awake, bool $is_prisoner_awake, bool $is_dog_present): bool
  {
    if ($is_dog_present) {
      return !$is_archer_awake;
    }

    return $this->canSignal($is_archer_awake, $is_prisoner_awake) && $this->canFastAttack($is_knight_awake);
  }
}
