<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoostezController extends AbstractController
{

    private $locales;
    private $defaultLocale;

    public function __construct($locales, $defaultLocale)
    {
        $this->locales = $locales;
        $this->defaultLocale = $defaultLocale;
    }

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
    public function boostez(): Response
    {
        return $this->render('boostez/index.html.twig');
    }

    #[Route(['FR' => '/newsletter', 'NL' => '/newsletter', 'EN' => '/newsletter'], name: 'app_newsletter')]
    public function newsletter(Request $request, EntityManagerInterface $entityManager)
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterFormType::class,$newsletter);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($newsletter);
            $entityManager->flush();
            $this->addFlash('string', 'Vous êtes bien inscrit à la newsletter!');
            return $this->redirect($request->headers->get('referer'));
        }
    }


}
