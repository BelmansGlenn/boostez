<?php

namespace App\Controller;

use App\Exception\CustomBadRequestException;
use App\Form\ContactFormType;
use App\Form\NewsletterFormType;
use App\Model\Contact;
use App\Services\Error\FormErrorService;
use App\Services\Mailer\MailerService;
use Flasher\Prime\FlasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ContactController extends AbstractController
{

    #[Route(['fr' => '/contact', 'nl' => '/contact', 'en' => '/contact'], name: 'app_contact')]
    public function index(): Response
    {

        $form = $this->createForm(NewsletterFormType::class);

        $contactForm = $this->createForm(ContactFormType::class);


        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'contactForm' => $contactForm->createView()
        ]);
    }

    #[Route(['fr' => '/envoyer_mail/{locale}'], name: 'app_mail')]
    public function send($locale, Request $request, MailerService $mailerService, FormErrorService $formErrorService, FlasherInterface $flasher, TranslatorInterface $translator): Response
    {

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
                $flasher->addSuccess($translator->trans('form.flash.success.contact', [], 'messages', $locale));
                return $this->redirect($request->headers->get('referer'));
            }catch (CustomBadRequestException)
            {
                $flasher->addWarning($translator->trans('form.flash.error.contact', [], 'messages', $locale));
                return $this->redirect($request->headers->get('referer'));
            }

        }
        $errors = $formErrorService->getErrorsFromForm($contactForm);
        foreach ($errors as $error){
            $flasher->addError($translator->trans($error[0], [], 'messages', $locale));
        }
        return $this->redirect($request->headers->get('referer'));

    }
}
