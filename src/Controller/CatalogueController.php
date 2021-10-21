<?php

namespace App\Controller;

use App\Entity\Catalogue;
use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function show(Environment $twig, Catalogue $catalogue, LivreRepository $livreRepository): Response
    {
        return new Response($twig->render('catalogue/show.html.twig', [
            'catalogue' => $catalogue,
            'livre' => $livreRepository->findBy(['auteur' => $auteur], ['titre' => 'DESC']),
        ]));
    }

    // public function index(Environment $twig, CatalogueRepository $catalogueRepository): Response
    // {
    //     return new Response($twig->render('catalogue/index.html.twig', [
    //         'catalogue' => $catalogueRepository->findAll(),
    //     ]));
    // }
}
