<?php

namespace App\Controller;

use App\Repository\LogoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NewsletterFormType;

class BiographyController extends AbstractController
{
    #[Route(['fr' => '/biographie', 'nl' => '/biografie', 'en' => '/biography'], name: 'app_biography')]
    public function index(LogoRepository $logoRepository): Response
    {
        $form = $this->createForm(NewsletterFormType::class);
       $logo = $logoRepository->findAllLogoByOrderByImportance();

        return $this->render('biography/index.html.twig', [
            'logo' => $logo,
            'form' => $form->createView()
        ]);
    }
}
