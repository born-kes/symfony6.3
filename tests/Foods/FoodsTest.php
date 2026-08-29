<?php
declare(strict_types=1);

namespace App\Tests;

use App\Entity\Animal\Elephant;
use App\Entity\Animal\Fox;
use App\Entity\Animal\Tiger;
use App\Entity\Food\FoodType;
use PHPUnit\Framework\TestCase;

class FoodsTest extends TestCase
{
    public function testTigerEatsMeat(): void
    {
        $tiger = new Tiger('Benek');
        $tigerDiet = $tiger->getDiet();
        $this->assertTrue($tigerDiet->hasFood(FoodType::MEAT));
        $this->assertFalse($tigerDiet->hasFood(FoodType::VEGETABLES));
    }

    public function testFoxEatsMeat(): void
    {
        $fox = new Fox('Benek');
        $foxDiet = $fox->getDiet();
        $this->assertTrue($foxDiet->hasFood(FoodType::MEAT));
        $this->assertFalse($foxDiet->hasFood(FoodType::VEGETABLES));
    }

    public function testElephantEatsVegetables(): void
    {
        $elephant = new Elephant('Benek');
        $elephantDiet = $elephant->getDiet();
        $this->assertTrue($elephantDiet->hasFood(FoodType::VEGETABLES));
        $this->assertFalse($elephantDiet->hasFood(FoodType::MEAT));
    }

}