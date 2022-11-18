<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Exception\RouteNotFoundException;
use App\Form\NewsletterFormType;
use App\Repository\BookReviewRepository;
use App\Services\EntityManager\EntityManagerService;
use App\Services\Error\FormErrorService;
use Flasher\Notyf\Prime\NotyfFactory;
use Flasher\Prime\FlasherInterface;
use Flasher\Toastr\Prime\ToastrFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class BoostezController extends AbstractController
{



    #[Route(['fr' => '/', 'nl' => '/', 'en' => '/'], name: 'app_home')]
    public function home(Request $request): Response
    {
        $lang = $request->getLocale();

        switch ($lang){
            case 'fr':
                return $this->redirect('https://www.50spoons.com/fr/');
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/');
            default:
                return $this->redirect('https://www.50spoons.com/en/');
        }
//        $form = $this->createForm(NewsletterFormType::class);
//
//        return $this->render('home/index.html.twig', [
//            'form' => $form->createView(),
//        ]);
    }


    #[Route(['fr' => '/boostez', 'nl' => '/boostjezelf', 'en' => '/boostyourself'], name: 'app_boostez')]
    public function boostez(BookReviewRepository $bookReviewRepository, Request $request): Response
    {
        $lang = $request->getLocale();

        switch ($lang){
            case 'fr':
                return $this->redirect('https://www.50spoons.com/fr/boostez');
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/boostjezelf');
            default:
                return $this->redirect('https://www.50spoons.com/en/boostyourself');
        }
//        $form = $this->createForm(NewsletterFormType::class);
//
//        $review = $bookReviewRepository->findTwoBookReviewByLocale($request->getLocale());
//
//
//        return $this->render('boostez/index.html.twig',[
//            'form' => $form->createView(),
//            'review' => $review
//        ]);
    }

//    #[Route(['fr' => '/newsletter/{locale}'], name: 'app_newsletter')]
//    public function handleNewsletter($locale,Request $request, FormErrorService $formErrorService, EntityManagerService $entityManagerService, NotyfFactory $flasher, TranslatorInterface $translator)
//    {
//        $newsletter = new Newsletter();
//        $form = $this->createForm(NewsletterFormType::class, $newsletter);
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid())
//        {
//            $entityManagerService->create($newsletter);
//            $flasher->addSuccess($translator->trans('form.flash.success.newsletter', [], 'messages', $locale));
//            return $this->redirect($request->headers->get('referer'));
//        }
//        $errors = $formErrorService->getErrorsFromForm($form);
//        foreach ($errors as $error){
//            $flasher->addError($translator->trans($error[0], [], 'messages', $locale));
//        }
//        return $this->redirect($request->headers->get('referer'));
//
//    }

}
