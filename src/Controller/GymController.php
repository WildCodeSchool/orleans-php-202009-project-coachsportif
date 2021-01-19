<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use App\Entity\Gym;
use App\Repository\GymRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GymController
 * @package App\Controller
 * @Route("/")
 */
class GymController extends AbstractController
{
    /**
     * @Route("/salle_entrainement", name="gym", methods={"GET"})
     * @param GymRepository $gymRepository
     * @return Response
     */
    public function index(GymRepository $gymRepository): Response
    {
        $gymtexts = $gymRepository->findAll();
        return $this->render('gym/index.html.twig', [
            'gymtexts' => $gymtexts,
        ]);
    }
}
