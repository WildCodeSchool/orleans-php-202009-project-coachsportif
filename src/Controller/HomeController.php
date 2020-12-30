<?php

namespace App\Controller;

use App\Entity\Home;
use App\Repository\CarouselRepository;
use App\Repository\HomePicturesRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param HomeRepository $homeRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(HomeRepository $homeRepository, CarouselRepository $carouselRepository): Response
    {
        $home = $homeRepository->findAll();
        $pictures = $carouselRepository->findAll();
        return $this->render('home/index.html.twig', [
            'pictures' => $pictures,
            'home' => $home
        ]);
    }
}
