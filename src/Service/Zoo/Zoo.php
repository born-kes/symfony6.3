<?php
declare(strict_types=1);

namespace App\Service\Zoo;

use App\Entity\Animal\Animal;
use App\Entity\Food\Meat;
use App\Entity\Food\Vegetable;
use Exception;

class Zoo implements IZoo
{
    /**
     * @var Animal[]
     */
    private array $animals = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function feedAnimals(): void
    {
        foreach ($this->animals as $animal) {
            try {
                if ($animal->eatsMeat()) {
                    $animal->eat(food: new Meat());
                }
                if ($animal->eatsVegetable()) {
                    $animal->eat(food: new Vegetable());
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function takeCareOfAnimals(): void
    {
        foreach ($this->animals as $animal) {
            $animal->groom();
        }
    }

    public function showAnimals()
    {
        foreach ($this->animals as $animal) {
            echo $animal->presentsItself() . "\n";
        }
    }
}
