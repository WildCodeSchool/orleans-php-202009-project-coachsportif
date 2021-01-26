<?php

namespace App\Controller;

use App\Repository\CgvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/cgv")
 */
class CgvController extends AbstractController
{
    /**
     * @Route("/", name="cgv_index")
     * @param CgvRepository $cgvRepository
     * @return Response
     */
    public function index(CgvRepository $cgvRepository): Response
    {
        return $this->render('cgv/index.html.twig', [
            "cgv" => $cgvRepository->findOneBy([]),
        ]);
    }
}
