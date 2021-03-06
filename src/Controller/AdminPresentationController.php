<?php

namespace App\Controller;

use App\Entity\Presentation;
use App\Form\PresentationType;
use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/presentation")
 */
class AdminPresentationController extends AbstractController
{
    /**
     * @Route("/", name="presentation_admin", methods={"GET"})
     * @param PresentationRepository $presentRepository
     * @return Response
     */
    public function index(PresentationRepository $presentRepository): Response
    {
        return $this->render('admin/presentation/index.html.twig', [
            'presentations' => $presentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau", name="presentation_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $presentation = new Presentation();
        $form = $this->createForm(PresentationType::class, $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentation);
            $entityManager->flush();
            $this->addFlash('success', 'La présentation a bien été ajoutée');
            return $this->redirectToRoute('presentation_admin');
        }

        return $this->render('admin/presentation/new.html.twig', [
            'presentation' => $presentation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="presentation_show", methods={"GET"})
     * @param Presentation $presentation
     * @return Response
     */
    public function show(Presentation $presentation): Response
    {
        return $this->render('admin/presentation/show.html.twig', [
            'presentation' => $presentation,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="presentation_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Presentation $presentation
     * @return Response
     */
    public function edit(Request $request, Presentation $presentation): Response
    {
        $form = $this->createForm(PresentationType::class, $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La présentation a bien été modifiée');

            return $this->redirectToRoute('presentation_admin');
        }

        return $this->render('admin/presentation/edit.html.twig', [
            'presentation' => $presentation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="presentation_delete", methods={"DELETE"})
     * @param Request $request
     * @param Presentation $presentation
     * @return Response
     */
    public function delete(Request $request, Presentation $presentation): Response
    {
        if ($this->isCsrfTokenValid('delete' . $presentation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentation);
            $entityManager->flush();
            $this->addFlash('danger', 'La présentation a bien été supprimée');
        }

        return $this->redirectToRoute('presentation_admin');
    }
}
