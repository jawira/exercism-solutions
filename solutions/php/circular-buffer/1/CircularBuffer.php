<?php declare(strict_types=1);

class CircularBuffer
{
  private array $buffer;
  private int $pointerRead;
  private int $pointerWrite;

  public function __construct(private readonly int $size)
  {
    $this->clear();
  }

  public function read(): string
  {
    $item = $this->buffer[$this->pointerRead];
    $this->buffer[$this->pointerRead] = null;
    is_string($item) or throw new BufferEmptyError();
    $this->pointerRead = $this->incrementPointer($this->pointerRead);
    return $item;
  }

  public function write(string $item): void
  {
    is_null($this->buffer[$this->pointerWrite]) or throw new BufferFullError();
    $this->buffer[$this->pointerWrite] = $item;
    $this->pointerWrite = $this->incrementPointer($this->pointerWrite);
  }

  public function forceWrite(string $item): void
  {
    if (is_string($this->buffer[$this->pointerWrite])) {
      $this->pointerRead = $this->incrementPointer($this->pointerWrite);
    }
    $this->buffer[$this->pointerWrite] = null;
    $this->write($item);
  }

  public function clear(): void
  {
    $this->buffer = array_fill(0, $this->size, null);
    $this->pointerRead = $this->pointerWrite = 0;
  }

  public function incrementPointer(int $pointer): int
  {
    return (++$pointer === $this->size) ? 0 : $pointer;
  }
}

class BufferFullError extends Exception
{
}

class BufferEmptyError extends Exception
{
}
