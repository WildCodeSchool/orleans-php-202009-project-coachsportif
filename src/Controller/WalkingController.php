<?php

namespace App\Controller;

use App\Entity\Walking;
use App\Form\WalkingType;
use App\Repository\WalkingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/walking")
 */
class WalkingController extends AbstractController
{
    /**
     * @Route("/", name="walking_index", methods={"GET"})
     * @param WalkingRepository $walkingRepository
     * @return Response
     */
    public function index(WalkingRepository $walkingRepository): Response
    {
        return $this->render('walking/index.html.twig', [
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

            return $this->redirectToRoute('walking_index');
        }

        return $this->render('walking/new.html.twig', [
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
     */
    public function edit(Request $request, Walking $walking): Response
    {
        $form = $this->createForm(WalkingType::class, $walking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('walking_index');
        }

        return $this->render('walking/edit.html.twig', [
            'walking' => $walking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="walking_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Walking $walking): Response
    {
        if ($this->isCsrfTokenValid('delete' . $walking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($walking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('walking_index');
    }

    /**
     * @Route("/walking/admin", name="walking_admin", methods={"GET"})
     * @param WalkingRepository $walkingRepository
     * @return Response
     */
    public function admin(WalkingRepository $walkingRepository): Response
    {
        return $this->render('walking/admin.html.twig', [
            'walkings' => $walkingRepository->findAll(),
        ]);
    }
}
