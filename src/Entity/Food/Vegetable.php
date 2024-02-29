<?php
declare(strict_types=1);

namespace App\Entity\Food;

class Vegetable extends Food
{
    public function __construct()
    {
        parent::__construct(FoodType::VEGETABLES);
    }
}
