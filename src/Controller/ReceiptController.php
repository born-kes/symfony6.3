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
    #[Route('/receipt', name: 'add_receipt')]
    public function addReceipt(Request $request, ManagerRegistry $doctrine): Response
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


        return $this->render('receipt/addReceipt.html.twig', [
            'form' => $form->createView(),
            'getProduct' => $productName,
        ]);
    }

    #[Route('/', name: 'app_react')]
    public function react(): Response
    {
        return $this->render('receipt/react.html.twig');
    }
}
