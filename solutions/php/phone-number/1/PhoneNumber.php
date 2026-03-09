<?php declare(strict_types=1);

class PhoneNumber
{
    public function __construct(private string $number)
    {
        $clean = '';
        for ($i = 0; $i < strlen($number); $i++) {
            if (ctype_alpha($number[$i])) {
                throw new InvalidArgumentException('letters not permitted');
            }
            if (in_array($number[$i], ['@', ':', '!'])) {
                throw new InvalidArgumentException('punctuations not permitted');
            }
            if (ctype_digit($number[$i])) {
                $clean .= $number[$i];
            }
        }
        if (strlen($clean) < 10 || 11 < strlen($clean)) {
            throw new InvalidArgumentException;
        } elseif (strlen($clean) === 11) {
            $clean[0] === '1' or throw new InvalidArgumentException('11 digits must start with 1');
        } else {
            $clean = '1' . $clean;
        }
        $clean[1] !== '0' or throw new InvalidArgumentException('area code cannot start with zero');
        $clean[1] !== '1' or throw new InvalidArgumentException('area code cannot start with one');
        $clean[4] !== '0' or throw new InvalidArgumentException('exchange code cannot start with zero');
        $clean[4] !== '1' or throw new InvalidArgumentException('exchange code cannot start with one');
        $clean = ltrim($clean, '1');
        return $this->number = $clean;
    }

    public function number(): string
    {
        return $this->number;
    }
}
