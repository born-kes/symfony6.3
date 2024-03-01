<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Animal\Characteristic\IFur;
use App\Entity\Food\FoodType;

class Fox extends Animal implements IFur
{
    use Characteristic\Fur;

    protected string $species = 'Lis';

    protected function getElementDiet(): array
    {
        return [FoodType::MEAT];
    }

    public function groom(): void
    {
        $this->setCleanFur();
    }

    public function presentsItself(): string
    {
        return sprintf($this->isFurClean() ? self::FUR_CLEAN : self::FUR_DIRTY, $this);
    }
}
