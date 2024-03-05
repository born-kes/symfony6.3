<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Food\Food;
use App\Entity\Food\FoodCollection;
use App\Entity\Food\FoodType;
use App\Entity\Food\IFood;
use Exception;

/**
 * magic method hasFur in interface IFur is never used
 */
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }

    public function getDiet(): FoodCollection
    {
        return $this->diet;
    }

    public function __toString(): string
    {
        return "{$this->species} {$this->name}";
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return bool
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        if(strpos($name, 'has') === 0) {
            return false;
        }

        throw new Exception("Method {$name} does not exist");
    }
}
