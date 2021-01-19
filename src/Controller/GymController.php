<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use App\Entity\Gym;
use App\Repository\GymRepository;
use App\Repository\OpinionRepository;
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
    private const TRAINING_PAGE = "training";

    /**
     * @Route("/salle_entrainement", name="gym", methods={"GET"})
     * @param GymRepository $gymRepository
     * @param OpinionRepository $opinionRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(
        GymRepository $gymRepository,
        OpinionRepository $opinionRepository,
        CarouselRepository $carouselRepository
    ): Response {
        $opinions = $opinionRepository->findBy(['page' => self::TRAINING_PAGE]);
        $pictures = $carouselRepository->findBy(['page' => self::TRAINING_PAGE]);
        $gymtexts = $gymRepository->findAll();
        return $this->render('gym/index.html.twig', [
            'gymtexts' => $gymtexts,
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }
}
