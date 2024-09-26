<?php
declare(strict_types=1);

namespace App\Entity\Food;

interface IFood
{
    public function type(): FoodType;

    public function __toString(): string;
}
