<?php
declare(strict_types=1);

namespace App\Entity\Food;

class FoodCollection
{
    /**
     * @var FoodType[] $food
     */
    private array $food = [];

    public function addFood(FoodType $food): void
    {
        $this->food[] = $food;
    }

    public function hasFood(FoodType $food): bool
    {
        return in_array($food, $this->food);
    }
}
