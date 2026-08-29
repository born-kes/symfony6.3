<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Food\FoodType;

class Rhino extends Animal
{
    protected string $species = 'Nosorożec';

    protected function getElementDiet(): array
    {
        return [FoodType::VEGETABLES];
    }

    public function groom(): void
    {
    }

    public function presentsItself(): string
    {
        return "Jestem {$this}";
    }
}
