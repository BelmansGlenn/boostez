<?php

namespace App\Controller;

use App\Repository\LogoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BiographyController extends AbstractController
{
    #[Route(['FR' => '/biographie', 'NL' => '/biografie', 'EN' => '/biography'], name: 'app_biography')]
    public function index(LogoRepository $logoRepository): Response
    {

       $logo = $logoRepository->findAllLogoByOrderByImportance();

        return $this->render('biography/index.html.twig', [
            'logo' => $logo
        ]);
    }
}
