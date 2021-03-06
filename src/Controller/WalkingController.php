<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\CarouselRepository;
use App\Repository\OpinionRepository;
use App\Repository\WalkingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/marche")
 */
class WalkingController extends AbstractController
{
    /**
     * @Route("/", name="walking_index", methods={"GET"})
     * @param WalkingRepository $walkingRepository
     * @param CarouselRepository $carouselRepository
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(
        WalkingRepository $walkingRepository,
        CarouselRepository $carouselRepository,
        OpinionRepository $opinionRepository
    ): Response {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::WALKING_PAGE]);
        $opinions = $opinionRepository->findBy(['page' => OpinionType::WALKING_PAGE]);
        return $this->render('walking/index.html.twig', [
            'walkings' => $walkingRepository->findAll(),
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }

    /**
     * @Route("/calendrier", name="walking_calendar")
     * @param WalkingRepository $walkingRepository
     * @return Response
     */
    public function calendar(WalkingRepository $walkingRepository): Response
    {
        return $this->render('walking/calendar.html.twig', [
            'pdf' => $walkingRepository->findOneBy([]),
        ]);
    }
}
