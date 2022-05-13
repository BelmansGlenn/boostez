<?php

namespace App\Controller;

use App\Entity\BusinessConference;
use App\Entity\BusinessWorkshop;
use App\Entity\PrivateRetreat;
use App\Entity\PrivateWorkshop;
use App\Form\NewsletterFormType;
use App\Repository\BusinessConferenceRepository;
use App\Repository\BusinessWorkshopRepository;
use App\Repository\PrivateRetreatRepository;
use App\Repository\PrivateWorkshopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    CONST BUSINESS_CONF = 'pour les entreprises';
    CONST PRIVATE_CONF = 'pour les particuliers';


    #[Route(['FR' => '/conferences', 'NL' => '/conferenties', 'EN' => '/conferences'], name: 'app_conference')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(NewsletterFormType::class);
        $businessConf = $entityManager->getRepository(BusinessConference::class)->findAllConfNameByLocale($request->getLocale());
        $businessWorkshop = $entityManager->getRepository(BusinessWorkshop::class)->findAllConfNameByLocale($request->getLocale());
        $privateWorkshop = $entityManager->getRepository(PrivateWorkshop::class)->findAllConfNameByLocale($request->getLocale());
        $privateRetreat = $entityManager->getRepository(PrivateRetreat::class)->findAllConfNameByLocale($request->getLocale());

        return $this->render('conference/index.html.twig', [
            'form' => $form,
            'businessConf' => $businessConf,
            'businessWorkshop' => $businessWorkshop,
            'privateWorkshop' => $privateWorkshop,
            'privateRetreat' => $privateRetreat
        ]);
    }

    #[Route(['FR' => '/entreprise/conference/{slug}', 'NL' => '/bedrif/conferentie/{slug}', 'EN' => '/business/conference/{slug}'], name: 'app_business_conference')]
    public function businessConference($slug, BusinessConferenceRepository $businessConferenceRepository, Request $request): Response
    {
        $businessConf = $businessConferenceRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());

        return $this->render('conference/conference.html.twig', [
            'conference' => $businessConf,
            'targetedAudience' => self::BUSINESS_CONF
        ]);
    }

    #[Route(['FR' => '/entreprise/atelier/{slug}', 'NL' => '/bedrif/werkplaats/{slug}', 'EN' => '/business/workshop/{slug}'], name: 'app_business_workshop')]
    public function businessWorkshop($slug, BusinessWorkshopRepository $businessWorkshopRepository, Request $request): Response
    {
        $businessWorkshop = $businessWorkshopRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());

        return $this->render('conference/conference.html.twig', [
            'conference' => $businessWorkshop,
            'targetedAudience' => self::BUSINESS_CONF
        ]);
    }

    #[Route(['FR' => '/particulier/atelier/{slug}', 'NL' => '/bijzonder/werkplaats/{slug}', 'EN' => '/private/workshop/{slug}'], name: 'app_private_workshop')]
    public function privateWorkshop($slug, PrivateWorkshopRepository $privateWorkshopRepository, Request $request): Response
    {
        $privateWorkshop = $privateWorkshopRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());

        return $this->render('conference/conference.html.twig', [
            'conference' => $privateWorkshop,
            'targetedAudience' => self::PRIVATE_CONF
        ]);
    }

    #[Route(['FR' => '/particulier/retraite/{slug}', 'NL' => '/bijzonder/toevluchtsoord/{slug}', 'EN' => '/private/retreat/{slug}'], name: 'app_private_retreat')]
    public function privateRetreat($slug, PrivateRetreatRepository $privateRetreatRepository, Request $request): Response
    {
        $privateRetreat = $privateRetreatRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
        
        return $this->render('conference/conference.html.twig', [
            'conference' => $privateRetreat,
            'targetedAudience' => self::PRIVATE_CONF
        ]);
    }
}
