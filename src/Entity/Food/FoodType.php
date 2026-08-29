<?php
declare(strict_types=1);

namespace App\Entity\Food;

enum FoodType: string
{
    case MEAT = 'mięso';
    case VEGETABLES = 'warzywa';
}
