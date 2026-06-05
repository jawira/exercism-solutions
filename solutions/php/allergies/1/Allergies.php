<?php declare(strict_types=1);

class Allergies
{

    public function __construct(private int $score)
    {
    }

    public function isAllergicTo(Allergen $allergen): bool
    {
        return boolval($allergen->allergen & $this->score);
    }

    public function getList(): array
    {
        return array_filter(Allergen::allergenList(), fn(Allergen $allergen): bool => $this->isAllergicTo($allergen));
    }
}

class Allergen
{
    public const EGGS = 1;
    public const PEANUTS = 2;
    public const SHELLFISH = 4;
    public const STRAWBERRIES = 8;
    public const TOMATOES = 16;
    public const CHOCOLATE = 32;
    public const POLLEN = 64;
    public const CATS = 128;

    public function __construct(public int $allergen)
    {
    }

    public static function allergenList(): array
    {
        return [
            new Allergen(self::EGGS),
            new Allergen(self::PEANUTS),
            new Allergen(self::SHELLFISH),
            new Allergen(self::STRAWBERRIES),
            new Allergen(self::TOMATOES),
            new Allergen(self::CHOCOLATE),
            new Allergen(self::POLLEN),
            new Allergen(self::CATS),
        ];
    }

    public function getScore(): int
    {
        return $this->allergen;
    }
}
