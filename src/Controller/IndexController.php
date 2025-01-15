<?php
declare(strict_types = 1);


namespace App\Controller;

use App\Entity\Flyer;
use App\Form\FlyerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route(path: '/flyer/edit/{flyer}', name: 'flyer_edit')]
    public function flyerForm(Request $request, Flyer $flyer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FlyerType::class, $flyer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($flyer);
            $entityManager->flush();
                $this->addFlash('success', 'Flyer saved successfully.');
                return $this->redirectToRoute('flyer_edit', ['flyer' => $flyer->getId()]);
        }

        return $this->render('flyer/edit.html.twig', ['form' => $form]);
    }
}