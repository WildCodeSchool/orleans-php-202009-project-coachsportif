<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\CalendarRepository;
use App\Repository\UserCardRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Exception\AddressEncoderException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/compte")
 * Class ProfileController
 * @package App\Controller
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="profile_user", methods={"GET"})
     * @param CalendarRepository $calendar
     * @param UserRepository $users
     * @return Response
     */
    public function index(CalendarRepository $calendar, UserRepository $users): Response
    {
        return $this->render('profile/index.html.twig', [
            'calendars' => $calendar->findAll(),
            'users' => $users->findAll(),
            ]);
    }

    /**
     * @Route("/{id}/modifier", name="profile_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function edit(Request $request, User $user): Response
    {
        /** @var User $connectedUser */
        $connectedUser = $this->getUser();

        if ($connectedUser === $user || in_array('ROLE_COACH', $connectedUser->getRoles())) {
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
        } else {
            return $this->render('bundles/TwigBundle/Exception/error403.html.twig');
        }
    }

    /**
     * @Route("/admin/{id}", name="profile_delete", methods={"DELETE"})
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
     * @Route("/{id}/reserve", name="profile_complet_user", methods={"GET","POST"})
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
     * @Route("/{id}/disponible", name="profile_remove_user", methods={"GET","POST"})
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
