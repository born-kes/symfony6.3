<?php

namespace App\Controller;

use App\Entity\Receipt;
use App\Form\ReceiptType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceiptController extends AbstractController
{
    #[Route('/receipt', name: 'app_receipt')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $receipt = new Receipt();
        $form = $this->createForm(ReceiptType::class, $receipt);
        $form->handleRequest($request);

        $productName = '';

        if ($form->isSubmitted() && $form->isValid()) {
            $productName = $receipt->getProduct()->getName();
            $productName .= ' ' . $receipt->getPrice();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($receipt);
            $entityManager->flush();
        }


        return $this->render('receipt/add.html.twig', [
            'form' => $form->createView(),
            'getProduct' => $productName,
        ]);
    }
}
