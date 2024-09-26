<?php
declare(strict_types=1);

namespace App\Entity\Food;

abstract class Food implements IFood
{
    public function __construct(private readonly FoodType $typ)
    {
    }

    public function type(): FoodType
    {
        return $this->typ;
    }

    public function __toString(): string
    {
        return $this->typ->value;
    }
}
