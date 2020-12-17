<?php

namespace App\Controller;

use App\Entity\Walking;
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
     * @return Response
     */
    public function show(WalkingRepository $walkingRepository): Response
    {
        $walks = $walkingRepository->findAll();
        $pictures = $walkingRepository->findAll();
        return $this->render('walking/show.html.twig', [
            'pictures' => $pictures,
            'walks' => $walks,
        ]);
    }
}
