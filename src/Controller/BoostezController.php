<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterFormType;
use App\Repository\BookReviewRepository;
use App\Services\EntityManager\EntityManagerService;
use App\Services\Error\FormErrorService;
use Flasher\Prime\FlasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class BoostezController extends AbstractController
{

    #[Route('/{redirect}', name: 'app_redirect', defaults: ['redirect' => 'FR'] )]
    public function redirectToHome(): Response
    {
        return $this->redirectToRoute('app_home.FR');
    }

    #[Route(['FR' => '/', 'NL' => '/', 'EN' => '/'], name: 'app_home', defaults: ['redirect' => 'FR'] )]
    public function home(): Response
    {
        $form = $this->createForm(NewsletterFormType::class);

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route(['FR' => '/boostez', 'NL' => '/boostez', 'EN' => '/boostez'], name: 'app_boostez')]
    public function boostez(BookReviewRepository $bookReviewRepository, Request $request): Response
    {
        $form = $this->createForm(NewsletterFormType::class);

        $review = $bookReviewRepository->findTwoBookReviewByLocale($request->getLocale());


        return $this->render('boostez/index.html.twig',[
            'form' => $form->createView(),
            'review' => $review
        ]);
    }

    #[Route(['FR' => '/newsletter/{locale}'], name: 'app_newsletter')]
    public function handleNewsletter($locale,Request $request, FormErrorService $formErrorService, EntityManagerService $entityManagerService, FlasherInterface $flasher, TranslatorInterface $translator)
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterFormType::class, $newsletter);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManagerService->create($newsletter);
            $flasher->addSuccess($translator->trans('form.flash.success.newsletter', [], 'messages', $locale));
            return $this->redirect($request->headers->get('referer'));
        }
        $errors = $formErrorService->getErrorsFromForm($form);
        foreach ($errors as $error){
            $flasher->addError($translator->trans($error[0], [], 'messages', $locale));
        }
        return $this->redirect($request->headers->get('referer'));

    }


}
