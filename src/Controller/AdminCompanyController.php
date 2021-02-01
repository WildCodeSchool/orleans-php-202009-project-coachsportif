<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CarouselType;
use App\Form\CompanyType;
use App\Form\OpinionType;
use App\Repository\CarouselRepository;
use App\Repository\CompanyRepository;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/entreprise")
 */
class AdminCompanyController extends AbstractController
{
    /**
     * @Route("/", name="company_admin", methods={"GET"})
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
        return $this->render('admin/company/index.html.twig', [
            'companies' => $companyRepository->findAll(),
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }

    /**
     * @Route("/nouveau", name="company_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($company);
            $entityManager->flush();
            $this->addFlash('success', 'Le nouveau texte a bien été crée');
            return $this->redirectToRoute('company_admin');
        }

        return $this->render('admin/company/new.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="company_show", methods={"GET"})
     * @param Company $company
     * @return Response
     */
    public function show(Company $company): Response
    {
        return $this->render('admin/company/show.html.twig', [
            'company' => $company,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="company_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function edit(Request $request, Company $company): Response
    {
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le texte a bien été modifié');
            return $this->redirectToRoute('company_admin');
        }

        return $this->render('admin/company/edit.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="company_delete", methods={"DELETE"})
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function delete(Request $request, Company $company): Response
    {
        if ($this->isCsrfTokenValid('delete' . $company->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($company);
            $entityManager->flush();
            $this->addFlash('danger', 'La partie a bien été supprimée');
        }

        return $this->redirectToRoute('company_admin');
    }
}
