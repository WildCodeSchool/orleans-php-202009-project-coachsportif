<?php

namespace App\Controller;

use App\Entity\Walking;
use App\Repository\CarouselRepository;
use App\Repository\WalkingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class nordicWalkingController
 * @package App\Controller
 * @Route("/walking", name="walking_")
 */
class WalkingController extends AbstractController
{
    /**
     * @Route("/", name="show")
     * @param WalkingRepository $walkingRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function show(WalkingRepository $walkingRepository, CarouselRepository $carouselRepository): Response
    {
        $walks = $walkingRepository->findAll();
        $pictures = $carouselRepository->findBy(['page' => 'walking']);
        return $this->render('walking/show.html.twig', [
            'pictures' => $pictures,
            'walks' => $walks,
        ]);
    }
}
