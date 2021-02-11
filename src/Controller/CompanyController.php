<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\CarouselRepository;
use App\Repository\CompanyRepository;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprise")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/", name="company_index")
     * @param CompanyRepository $companyRepository
     * @param OpinionRepository $opinionRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(
        CompanyRepository $companyRepository,
        OpinionRepository $opinionRepository,
        CarouselRepository $carouselRepository
    ): Response {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::COMPANY_PAGE]);
        $opinions = $opinionRepository->findBy(['page' => OpinionType::COMPANY_PAGE]);
        $descriptions = $companyRepository->findAll();
        return $this->render('company/index.html.twig', [
            'descriptions' => $descriptions,
            'opinions' => $opinions,
            'pictures' => $pictures,
        ]);
    }
}
