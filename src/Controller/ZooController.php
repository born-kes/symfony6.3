<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Animal\Elephant;
use App\Entity\Animal\Fox;
use App\Entity\Animal\Rabbit;
use App\Entity\Animal\Rhino;
use App\Entity\Animal\SnowLeopard;
use App\Entity\Animal\Tiger;
use App\Service\Zoo\Zoo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZooController extends AbstractController
{
    #[Route('/Zoo', name: 'app_zoo')]
    public function index(): Response
    {
        ob_start();

        $Zoo = new Zoo();
        $Zoo->addAnimal(new Tiger('Duke'));
        $Zoo->addAnimal(new Elephant('Dumbo'));
        $Zoo->addAnimal(new Rhino('Rhino'));
        $Zoo->addAnimal(new Fox('Fox'));
        $Zoo->addAnimal(new SnowLeopard('SnowLeopard'));
        $Zoo->addAnimal(new Rabbit('Rabbit'));

        $Zoo->feedAnimals();
        $Zoo->takeCareOfAnimals();
        $Zoo->showAnimals();

        return $this->render('Zoo/index.html.twig', ['zoo' => ob_get_clean(),]);
    }
}
