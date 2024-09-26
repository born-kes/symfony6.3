<?php
declare(strict_types=1);

namespace App\Entity\Animal\Characteristic;

trait Fur
{
    const FUR_CLEAN = "Jestem %s i mam piękne futro!";
    const FUR_DIRTY = "Jestem %s i moje futro jest brudne?";
    private bool $furClean = false;

    public function hasFur(): bool
    {
        return true;
    }

    public function isFurClean(): bool
    {
        return $this->furClean;
    }

    public function setCleanFur(): void
    {
        $this->furClean = true;
    }
}
