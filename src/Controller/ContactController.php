<?php

namespace App\Controller;

use App\Entity\ContactHome;
use App\Form\ContactHomeType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact", name="contact_")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="show")
     * @param Request $request
     * @param MailerInterface $mailer
     * @param ContactRepository $contactRepository
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function index(Request $request, MailerInterface $mailer, ContactRepository $contactRepository): Response
    {
        $contact = new ContactHome();
        /** @var string $from */
        $from = $this->getParameter('mailer_from');
        /** @var string $mailTo */
        $mailTo = $this->getParameter('mailer_from');
        $form = $this->createForm(ContactHomeType::class, $contact);
        $form->handleRequest($request);
        if (($form->isSubmitted() && $form->isValid())) {
            $email = (new Email())
                ->from($from)
                ->to($mailTo)
                ->subject('Sujet:' . $contact->getSubject())
                ->html($this->renderView('home/contactHomeEmail.html.twig', ['contact' => $contact]));
            $mailer->send($email);
            return $this->redirectToRoute('confirmation');
        }
        return $this->render('contact/contact.html.twig', [
            "form" => $form->createView(),
            "contacts" => $contactRepository->findAll(),
        ]);
    }
    /**
     * @Route ("/confirmation", name="confirmation")
     * @return Response
     */
    public function confirmation(): Response
    {
        return $this->render('contact/contactConfirmation.html.twig', [
        ]);
    }
}
