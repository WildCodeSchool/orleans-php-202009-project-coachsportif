<?php

namespace App\Controller;

use App\Entity\Walking;
use App\Form\WalkingType;
use App\Repository\WalkingRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/marche")
 */
class AdminWalkingController extends AbstractController
{
    /**
     * @Route("/", name="walking_admin", methods={"GET"})
     * @param WalkingRepository $walkingRepository
     * @return Response
     */
    public function index(WalkingRepository $walkingRepository): Response
    {
        return $this->render('admin/walking/index.html.twig', [
            'walkings' => $walkingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="walking_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $walking = new Walking();
        $form = $this->createForm(WalkingType::class, $walking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($walking);
            $entityManager->flush();
            $this->addFlash('success', 'La nouvelle rubrique à bien été créée');

            return $this->redirectToRoute('walking_admin');
        }

        return $this->render('admin/walking/new.html.twig', [
            'walking' => $walking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="walking_show", methods={"GET"})
     * @param Walking $walking
     * @return Response
     */
    public function show(Walking $walking): Response
    {
        return $this->render('walking/show.html.twig', [
            'walking' => $walking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="walking_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Walking $walking
     * @return Response
     */
    public function edit(Request $request, Walking $walking): Response
    {
        $form = $this->createForm(WalkingType::class, $walking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La rubrique à bien été modifiée');

            return $this->redirectToRoute('walking_admin');
        }

        return $this->render('admin/walking/edit.html.twig', [
            'walking' => $walking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="walking_delete", methods={"DELETE"})
     * @param Request $request
     * @param Walking $walking
     * @return Response
     */
    public function delete(Request $request, Walking $walking): Response
    {
        if ($this->isCsrfTokenValid('delete' . $walking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($walking);
            $entityManager->flush();
            $this->addFlash('danger', 'La rubrique à bien été supprimée');
        }

        return $this->redirectToRoute('walking_admin');
    }

    /**
     * @Route("/{id}/edit/pdf", name="walking_edit_pdf", methods={"GET","POST"})
     * @param Request $request
     * @param Walking $walking
     * @return Response
     */
    public function editPdf(Request $request, Walking $walking): Response
    {
        $form = $this->createForm(WalkingType::class, $walking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "Le PDF à bien été pris en compte");

            return $this->redirectToRoute('walking_admin');
        }

        return $this->render('admin/walking/editPdf.html.twig', [
            'walking' => $walking,
            'form' => $form->createView(),
        ]);
    }
}
