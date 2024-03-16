<?php

namespace App\Controller;

use App\Entity\Genre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeriesController extends AbstractController
{
    #[Route('/', name: 'app_series')]
    public function index(): Response
    {
        return $this->render('series/index.html.twig', [
            'controller_name' => 'SeriesController',
        ]);
    }
    #[Route('/genres', name: 'app_genre_show')]
    public function genres(EntityManagerInterface $entityManager): Response
    {
        $genres = $entityManager->getRepository(Genre::class)->findAll();

        return $this->render('series/show.html.twig', [
            'genres' => $genres
        ]);
    }

}
