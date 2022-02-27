<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use App\Repository\ScreeningRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    function home() : Response
    {
        return $this->redirectToRoute('films');
    }

    /**
     * @Route("/seances", name="seances")
     */
    public function seances(MovieRepository $movieRepository): Response
    {
        return $this->render('horaires.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/films", name="films")
     */
    function films(MovieRepository $movieRepository) : Response
    {
        return $this->render('films.html.twig', [
            'movies' => $movieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/film/{id}", name="film", methods={"GET"})
     */
    public function show(Movie $movie): Response
    {
        return $this->render('film.html.twig', [
            'movie' => $movie,
        ]);
    }
}
