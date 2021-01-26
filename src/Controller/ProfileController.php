<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Entity\User;
use App\Entity\UserCard;
use App\Form\UserType;
use App\Repository\CalendarRepository;
use App\Repository\UserCardRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/profile", name="profile_")
 * Class ProfileController
 * @package App\Controller
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="user", methods={"GET"})
     * @param CalendarRepository $calendar
     * @return Response
     */
    public function index(CalendarRepository $calendar): Response
    {
        return $this->render('profile/index.html.twig', ['calendars' => $calendar->findAll()]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile_user');
        }

        return $this->render('profile/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function delete(Request $request, User $user): Response
    {
        if (
            $this->isCsrfTokenValid(
                'delete' . $user->getId(),
                $request->request->get('_token')
            )
        ) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profile_user');
    }
    /**
     * @Route("/{id}/completUser", name="complet_user", methods={"GET","POST"})
     * @param Calendar $calendar
     * @return Response
     */
    public function completUser(Calendar $calendar): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $calendar->setUser($user->getId());
        $entityManager =  $this->getDoctrine()->getManager();

        $entityManager->persist($calendar);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('profile_user');
    }

    /**
     * @Route("/{id}/removeUser", name="remove_user", methods={"GET","POST"})
     * @param Calendar $calendar
     * @return Response
     */
    public function removeUser(Calendar $calendar): Response
    {
        $calendar->setUser(null);
        $entityManager =  $this->getDoctrine()->getManager();

        $entityManager->persist($calendar);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('profile_user');
    }
}
