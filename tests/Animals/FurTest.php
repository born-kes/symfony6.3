<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Animal\Characteristic\IFur;
use Exception;
use PHPUnit\Framework\TestCase;

class FurTest extends TestCase
{
    public function testImplementAnimalInterface()
    {
        $elephant = new Elephant('Dumbo');
        $this->assertNotInstanceOf(IFur::class, $elephant);

        $tiger = new Tiger('Bob');
        $this->assertInstanceOf(IFur::class, $tiger);

        $fox = new Fox('Fox');
        $this->assertInstanceOf(IFur::class, $fox);
    }

    public function testHasFur()
    {
        $tiger = new Tiger('Bob');
        $this->assertTrue($tiger->hasFur());

        $fox = new Fox('Fox');
        $this->assertTrue($fox->hasFur());

        $elephant = new Elephant('Dumbo');
        $this->assertFalse($elephant->hasFur());
    }

    public function testElephantNotHaveMethodSetCleanFur()
    {
        $elephant = new Elephant('Dumbo');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Method setCleanFur does not exist');

        $this->assertTrue($elephant->setCleanFur());
    }

    public function testTiger()
    {
        $tiger = new Tiger('Bob');
        $this->assertEquals('Jestem Tygrys Bob i moje futro jest brudne?', $tiger->presentsItself());
        $tiger->setCleanFur();
        $this->assertEquals('Jestem Tygrys Bob i mam piękne futro!', $tiger->presentsItself());
    }

    public function testFox()
    {
        $fox = new Fox('Fox');
        $this->assertEquals('Jestem Lis Fox i moje futro jest brudne?', $fox->presentsItself());
        $fox->setCleanFur();
        $this->assertEquals('Jestem Lis Fox i mam piękne futro!', $fox->presentsItself());
    }

}
