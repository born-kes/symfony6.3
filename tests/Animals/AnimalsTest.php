<?php
declare(strict_types=1);

namespace App\Entity\Animal;

use App\Entity\Food\Vegetable;
use Exception;
use PHPUnit\Framework\TestCase;

class AnimalsTest extends TestCase
{
    public function testImplementAnimalInterface()
    {
        $elephant = new Elephant('Dumbo');
        $this->assertInstanceOf(IAnimal::class, $elephant);

        $tiger = new Tiger('Bob');
        $this->assertInstanceOf(IAnimal::class, $tiger);

        $fox = new Fox('Fox');
        $this->assertInstanceOf(IAnimal::class, $fox);
    }


    public function testTiger()
    {
        $tiger = new Tiger('Bob');
        $this->assertTrue($tiger->eatsMeat());
        $this->assertFalse($tiger->eatsVegetable());
        $this->assertEquals('Tygrys Bob', "$tiger");
        $this->assertEquals('Jestem Tygrys Bob i moje futro jest brudne?', $tiger->presentsItself());
        $tiger->groom();
        $this->assertEquals('Jestem Tygrys Bob i mam piękne futro!', $tiger->presentsItself());
    }

    public function testFox()
    {
        $fox = new Fox('Fox');
        $this->assertTrue($fox->eatsMeat());
        $this->assertTrue($fox->eatsVegetable());
        $this->assertEquals('Lis Fox', "$fox");
        $this->assertEquals('Jestem Lis Fox i moje futro jest brudne?', $fox->presentsItself());
        $fox->groom();
        $this->assertEquals('Jestem Lis Fox i mam piękne futro!', $fox->presentsItself());
    }

    public function testTigerEatVegetable()
    {
        $tiger = new Tiger('Bob');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Tygrys nie je warzyw');

        $tiger->eat(food: new Vegetable());
    }
}
