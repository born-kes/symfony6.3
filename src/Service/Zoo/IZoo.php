<?php
declare(strict_types=1);

namespace App\Service\Zoo;

use App\Entity\Animal\Animal;

interface IZoo
{
    public function addAnimal(Animal $animal): void;

    public function feedAnimals(): void;

    public function takeCareOfAnimals(): void;
}
