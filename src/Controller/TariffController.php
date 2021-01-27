<?php

namespace App\Controller;

use App\Repository\TariffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tarifs")
 */
class TariffController extends AbstractController
{
    /**
     * @Route("/", name="tarifs_index")
     * @param TariffRepository $tariffRepository
     * @return Response
     */
    public function index(TariffRepository $tariffRepository): Response
    {
        return $this->render('tarif/index.html.twig', [
            'tariffs' => $tariffRepository->findAll()
        ]);
    }
}
