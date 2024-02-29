<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Food\Food;
use App\Entity\Food\FoodCollection;
use App\Entity\Food\FoodType;
use App\Entity\Food\IFood;
use Exception;

abstract class Animal implements IAnimal
{
    protected string $species;
    private FoodCollection $diet;

    public function __construct(protected string $name)
    {
        $this->diet = new FoodCollection();
        /** @var FoodType $food */
        foreach ($this->getElementDiet() as $food) {
            $this->diet->addFood($food);
        }
    }

    abstract public function groom(): void;

    abstract public function presentsItself(): string;

    /**
     * @return FoodType[]
     */
    abstract protected function getElementDiet(): array;

    /**
     * @param Food $food
     * @return void
     * @throws Exception
     */
    public function eat(IFood $food): void
    {
        if ($this->diet->hasFood($food->type())) {
            echo "{$this->species} {$this->name} je {$food}\n";
        } else {
            throw new Exception("{$this->species} nie je {$food}");
        }
    }

    public function eatsMeat(): bool
    {
        return $this->diet->hasFood(FoodType::MEAT);
    }

    public function eatsVegetable(): bool
    {
        return $this->diet->hasFood(FoodType::VEGETABLES);
    }

    public function __toString(): string
    {
        return "{$this->species} {$this->name}";
    }
}
