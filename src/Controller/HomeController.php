<?php

namespace App\Controller;

use App\Entity\Home;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param HomeRepository $homeRepository
     * @return Response
     */
    public function index(HomeRepository $homeRepository): Response
    {
        $home = $homeRepository->findAll();
        return $this->render('home/index.html.twig', ['home' => $home]);
    }

}
