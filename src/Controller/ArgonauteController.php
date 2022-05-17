<?php

namespace App\Controller;

use ArgonauteFormType;
use App\Entity\ListeArgonautes;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ListeArgonautesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArgonauteController extends AbstractController
{
    #[Route('/argonaute', name: 'app_argonaute')]
    public function index(): Response
    {
        return $this->render('argonaute/index.html.twig', [
            'controller_name' => 'ArgonauteController',
        ]);
    }

    #[Route("/", name: "home_argonaute")]
    public function home( ListeArgonautesRepository $repo, EntityManagerInterface $em, Request $request): Response
    {
        
        $argonaute = new ListeArgonautes();
        $argonautes = $repo->findAll();
        $form = $this->createForm(ArgonauteFormType::class, $argonaute);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $argonaute = $form->getData();
            $em->persist($argonaute);
            $em->flush();
            return $this->redirectToRoute('home_argonaute');
        }

        return $this->render("argonaute/home.html.twig", [
            'argonauteForm' => $form->createView(),
            'argonautes' => $argonautes,
        ]);
    }
    
}
