<?php

namespace App\Controller;

use App\Exception\CustomBadRequestException;
use App\Form\ContactFormType;
use App\Form\NewsletterFormType;
use App\Model\Contact;
use App\Services\Mailer\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    #[Route(['FR' => '/contact', 'NL' => '/contact', 'EN' => '/contact'], name: 'app_contact')]
    public function index(Request $request, MailerService $mailerService): Response
    {

        $form = $this->createForm(NewsletterFormType::class);

        $contact = new Contact();

        $contactForm = $this->createForm(ContactFormType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid())
        {
            try {
                $mailerService->send(
                    'anne-everard@boostez.com',
                    'Nouveau message',
                    'contact/email.html.twig',
                    $contact
                    );

                $this->addFlash('success', 'Merci pour votre email, nous allons revenir vers vous au plus vite!');
                return $this->redirect($request->headers->get('referer'));
            }catch (CustomBadRequestException)
            {
                $this->addFlash('error', 'Une erreur est survenue lors de l\envoie du mail');
                return $this->redirect($request->headers->get('referer'));
            }

        }


        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'contactForm' => $contactForm->createView()
        ]);
    }
}
