<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Food\IFood;

interface IAnimal
{
    public function eat(IFood $food): void;

    public function eatsMeat(): bool;

    public function eatsVegetable(): bool;

    public function groom(): void;

    public function presentsItself(): string;
}
