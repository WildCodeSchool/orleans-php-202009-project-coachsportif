<?php

namespace App\Controller;

use App\Entity\Regulation;
use App\Form\RegulationType;
use App\Repository\RegulationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/regulation")
 */
class RegulationController extends AbstractController
{
    /**
     * @Route("/", name="regulation_index", methods={"GET"})
     * @param RegulationRepository $regulationRepository
     * @return Response
     */
    public function index(RegulationRepository $regulationRepository): Response
    {
        return $this->render('regulation/index.html.twig', [
            'regulations' => $regulationRepository->findAll(),
        ]);
    }
}
