<?php

namespace App\Controller;

use App\Repository\CGVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route ("/cgv")
 */
class CgvController extends AbstractController
{
    /**
     * @Route("/", name="cgv_index")
     * @param CGVRepository $cgvRepository
     * @return Response
     */
    public function index(CGVRepository $cgvRepository): Response
    {
        return $this->render('cgv/index.html.twig', [
            "cgv" => $cgvRepository->findOneBy([]),
        ]);
    }
}
