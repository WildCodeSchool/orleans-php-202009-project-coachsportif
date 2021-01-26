<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Form\CarouselType;
use App\Form\OpinionType;
use App\Repository\ActivityRepository;
use App\Repository\CarouselRepository;
use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminActivityController
 * @package App\Controller
 * @Route("/admin/activite")
 */
class AdminActivityController extends AbstractController
{
    /**
     * @Route("/new", name="activity_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activity);
            $entityManager->flush();
            $this->addFlash('success', 'Le texte a bien été ajouté');
            return $this->redirectToRoute('activity_admin');
        }

        return $this->render('admin/activity/new.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="activity_show", methods={"GET"})
     * @param Activity $activity
     * @return Response
     */
    public function show(Activity $activity): Response
    {
        return $this->render('admin/activity/show.html.twig', [
            'activity' => $activity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="activity_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Activity $activity
     * @return Response
     */
    public function edit(Request $request, Activity $activity): Response
    {
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activity_admin');
        }

        return $this->render('admin/activity/edit.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="activity_delete", methods={"DELETE"})
     * @param Request $request
     * @param Activity $activity
     * @return Response
     */
    public function delete(Request $request, Activity $activity): Response
    {
        if ($this->isCsrfTokenValid('delete' . $activity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($activity);
            $entityManager->flush();
            $this->addFlash('success', 'Le Texte de la partie activité adaptée a bien été supprimé');
        }

        return $this->redirectToRoute('activity_admin');
    }

    /**
     * @Route("/", name="activity_admin", methods={"GET"})
     * @param ActivityRepository $activityRepository
     * @return Response
     */
    public function indexAdmin(ActivityRepository $activityRepository): Response
    {
        $activities = $activityRepository->findAll();
        return $this->render('admin/activity/indexAdmin.html.twig', [
            'activities' => $activities,
        ]);
    }
}
