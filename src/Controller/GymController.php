<?php

namespace App\Controller;

use App\Form\CarouselType;
use App\Form\GymType;
use App\Form\OpinionType;
use App\Repository\CarouselRepository;
use App\Entity\Gym;
use App\Repository\FitnessRepository;
use App\Repository\GymRepository;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GymController
 * @package App\Controller
 * @Route("/salle_entrainement")
 */
class GymController extends AbstractController
{
    /**
     * @Route("/", name="gym", methods={"GET"})
     * @param GymRepository $gymRepository
     * @param OpinionRepository $opinionRepository
     * @param CarouselRepository $carouselRepository
     * @return Response
     */
    public function index(
        GymRepository $gymRepository,
        OpinionRepository $opinionRepository,
        CarouselRepository $carouselRepository
    ): Response {
        $opinions = $opinionRepository->findBy(['page' => OpinionType::TRAINING_PAGE]);
        $pictures = $carouselRepository->findBy(['page' => CarouselType::TRAINING_PAGE]);
        $gymtexts = $gymRepository->findAll();
        return $this->render('gym/index.html.twig', [
            'gymtexts' => $gymtexts,
            'pictures' => $pictures,
            'opinions' => $opinions,
        ]);
    }

    /**
     * @Route("/admin/new", name="gym_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $gym = new Gym();
        $form = $this->createForm(GymType::class, $gym);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gym);
            $entityManager->flush();

            return $this->redirectToRoute('gym');
        }

        return $this->render('/admin/gym/new.html.twig', [
            'gym' => $gym,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/{id}", name="gym_show", methods={"GET"})
     * @param Gym $gym
     * @return Response
     */
    public function show(Gym $gym): Response
    {
        return $this->render('gym/show.html.twig', [
            'gym' => $gym,
        ]);
    }

    /**
     * @Route("/admin/{id}/edit", name="gym_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Gym $gym
     * @return Response
     */
    public function edit(Request $request, Gym $gym): Response
    {
        $form = $this->createForm(GymType::class, $gym);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gym_index');
        }

        return $this->render('gym/edit.html.twig', [
            'gym' => $gym,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/{id}", name="gym_delete", methods={"DELETE"})
     * @param Request $request
     * @param Gym $gym
     * @return Response
     */
    public function delete(Request $request, Gym $gym): Response
    {
        if ($this->isCsrfTokenValid('delete' . $gym->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gym);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gym');
    }

    /**
     * @Route("/admin", name="gymAdmin", methods={"GET"})
     * @param GymRepository $gymRepository
     * @return Response
     */
    public function indexAdmin(GymRepository $gymRepository): Response
    {
        $gymtexts = $gymRepository->findAll();
        return $this->render('/gym/indexAdmin.html.twig', [
            'gymtexts' => $gymtexts,
        ]);
    }
}
