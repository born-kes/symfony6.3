<?php
declare(strict_types=1);

namespace App\Entity\Animal\Characteristic;

interface IFur
{
    public function hasFur(): bool;

    public function isFurClean(): bool;

    public function setCleanFur(): void;
}
