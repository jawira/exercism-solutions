<?php declare(strict_types=1);

class ProgramWindow
{
  public $x;
  public $y;
  public $width;
  public $height;

  public function __construct()
  {
    $this->x = 0;
    $this->y = 0;
    $this->width = 800;
    $this->height = 600;
  }

  public function resize(Size $size): void
  {
    $this->width = $size->width;
    $this->height = $size->height;
  }

  public function move(Position $position): void
  {
    $this->x = $position->x;
    $this->y = $position->y;
  }
}
