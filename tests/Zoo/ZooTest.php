<?php
declare(strict_types=1);

namespace App\Service\Zoo;

use App\Entity\Animal\Elephant;
use App\Entity\Animal\Tiger;
use PHPUnit\Framework\TestCase;

class ZooTest extends TestCase
{
    public function testZoo(): void
    {
        $zoo = new Zoo();
        $zoo->addAnimal(new Tiger( name: 'Zorro'));
        $zoo->addAnimal(new Elephant( name: 'Dumbo'));
        $zoo->feedAnimals();
        $zoo->takeCareOfAnimals();
        $zoo->showAnimals();

        $this->expectOutputString(
            "Tygrys Zorro je mięso\nSłoń Dumbo je warzywa\nJestem Tygrys Zorro i mam piękne futro!\nJestem Słoń Dumbo\n"
        );

    }

}