<?php

namespace App\Controller;

use App\Entity\Walking;
use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\CarouselRepository;
use App\Form\WalkingType;
use App\Repository\OpinionRepository;
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
     * @param CarouselRepository $carouselRepository
     * @param OpinionRepository $opinionRepository
     * @return Response
     */
    public function index(
        WalkingRepository $walkingRepository,
        CarouselRepository $carouselRepository,
        OpinionRepository $opinionRepository
    ): Response {
        $pictures = $carouselRepository->findBy(['page' => CarouselType::WALKING_PAGE]);
        $opinions = $opinionRepository->findBy(['page' => OpinionType::WALKING_PAGE]);
        return $this->render('walking/index.html.twig', [
            'walkings' => $walkingRepository->findAll(),
            'pictures' => $pictures,
            'opinions' => $opinions,
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

            return $this->redirectToRoute('walking_admin');
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

            return $this->redirectToRoute('walking_admin');
        }

        return $this->render('walking/edit.html.twig', [
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
        }

        return $this->redirectToRoute('walking_admin');
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
