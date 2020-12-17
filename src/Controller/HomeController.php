<?php

namespace App\Controller;

use App\Entity\Home;
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
     * @param HomePicturesRepository $homePicturesRepository
     * @return Response
     */
    public function index(HomeRepository $homeRepository, HomePicturesRepository $homePicturesRepository): Response
    {
        $home = $homeRepository->findAll();
        $pictures = $homePicturesRepository->findAll();
        return $this->render('home/index.html.twig', [
            'pictures' => $pictures,
            'home' => $home
        ]);
    }
}
