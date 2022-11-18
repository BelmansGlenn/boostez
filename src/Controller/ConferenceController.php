<?php

namespace App\Controller;

use App\Entity\BusinessCoaching;
use App\Entity\BusinessConference;
use App\Entity\BusinessWorkshop;
use App\Entity\PrivateCoaching;
use App\Entity\PrivateRetreat;
use App\Entity\PrivateWorkshop;
use App\Form\NewsletterFormType;
use App\Repository\BusinessCoachingRepository;
use App\Repository\BusinessConferenceRepository;
use App\Repository\BusinessWorkshopRepository;
use App\Repository\ConferenceReviewRepository;
use App\Repository\PrivateCoachingRepository;
use App\Repository\PrivateRetreatRepository;
use App\Repository\PrivateWorkshopRepository;
use App\Repository\SpeakerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    CONST BUSINESS_COLOR = 'business_color';
    CONST PRIVATE_COLOR = 'private_color';


    #[Route(['fr' => '/conferences', 'nl' => '/keynotes', 'en' => '/keynotes'], name: 'app_conference')]
    public function index(EntityManagerInterface $entityManager, Request $request, ConferenceReviewRepository $conferenceReviewRepository): Response
    {
        $lang = $request->getLocale();

        switch ($lang){
            case 'fr':
                return $this->redirect('https://www.50spoons.com/fr/conferences');
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/keynotes');
            default:
                return $this->redirect('https://www.50spoons.com/en/keynotes');
        }
//        $locale = $request->getLocale();
//        $form = $this->createForm(NewsletterFormType::class);
//        $businessConf = $entityManager->getRepository(BusinessConference::class)->findAllConfNameByLocale($locale);
//        $businessWorkshop = $entityManager->getRepository(BusinessWorkshop::class)->findAllConfNameByLocale($locale);
//        $businessCoaching = $entityManager->getRepository(BusinessCoaching::class)->findAllConfNameByLocale($locale);
//        $privateWorkshop = $entityManager->getRepository(PrivateWorkshop::class)->findAllConfNameByLocale($locale);
//        $privateRetreat = $entityManager->getRepository(PrivateRetreat::class)->findAllConfNameByLocale($locale);
//        $privateCoaching = $entityManager->getRepository(PrivateCoaching::class)->findAllConfNameByLocale($locale);
//        $review = $conferenceReviewRepository->findTwoConfReviewByLocale($locale);
//
//        return $this->render('conference/index.html.twig', [
//            'form' => $form->createView(),
//            'businessConf' => $businessConf,
//            'businessWorkshop' => $businessWorkshop,
//            'businessCoaching' => $businessCoaching,
//            'privateWorkshop' => $privateWorkshop,
//            'privateRetreat' => $privateRetreat,
//            'privateCoaching' => $privateCoaching,
//            'review' => $review
//        ]);
    }

//    #[Route(['fr' => '/entreprises/conference/{slug}', 'nl' => '/bedrijven/keynote/{slug}', 'en' => '/companies/keynote/{slug}'], name: 'app_business_conference')]
//    public function businessConference($slug, BusinessConferenceRepository $businessConferenceRepository, Request $request): Response
//    {
//        $businessConf = $businessConferenceRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
//        return $this->render('conference/conference.html.twig', [
//            'conference' => $businessConf,
//            'color' => self::BUSINESS_COLOR
//        ]);
//    }

//    #[Route(['fr' => '/entreprises/atelier/{slug}', 'nl' => '/bedrijven/workshop/{slug}', 'en' => '/companies/workshop/{slug}'], name: 'app_business_workshop')]
//    public function businessWorkshop($slug, BusinessWorkshopRepository $businessWorkshopRepository, Request $request): Response
//    {
//        $businessWorkshop = $businessWorkshopRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
//
//        return $this->render('conference/conference.html.twig', [
//            'conference' => $businessWorkshop,
//            'color' => self::BUSINESS_COLOR
//        ]);
//    }

//    #[Route(['fr' => '/entreprises/coaching/{slug}', 'nl' => '/bedrijven/coaching/{slug}', 'en' => '/companies/coaching/{slug}'], name: 'app_business_coaching')]
//    public function businessCoaching($slug, BusinessCoachingRepository $businessCoachingRepository, Request $request): Response
//    {
//        $businessCoaching = $businessCoachingRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
//
//        return $this->render('conference/conference.html.twig', [
//            'conference' => $businessCoaching,
//            'color' => self::PRIVATE_COLOR
//        ]);
//    }

//    #[Route(['fr' => '/particuliers/atelier/{slug}', 'nl' => '/particulieren/workshop/{slug}', 'en' => '/individuals/workshop/{slug}'], name: 'app_private_workshop')]
//    public function privateWorkshop($slug, PrivateWorkshopRepository $privateWorkshopRepository, Request $request): Response
//    {
//        $privateWorkshop = $privateWorkshopRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
//
//        return $this->render('conference/conference.html.twig', [
//            'conference' => $privateWorkshop,
//            'color' => self::PRIVATE_COLOR
//        ]);
//    }

//    #[Route(['fr' => '/particuliers/retraite/{slug}', 'nl' => '/particulieren/retraite/{slug}', 'en' => '/individuals/offsite/{slug}'], name: 'app_private_retreat')]
//    public function privateRetreat($slug, PrivateRetreatRepository $privateRetreatRepository, Request $request): Response
//    {
//        $privateRetreat = $privateRetreatRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
//
//        return $this->render('conference/conference.html.twig', [
//            'conference' => $privateRetreat,
//            'color' => self::PRIVATE_COLOR
//        ]);
//    }

//    #[Route(['fr' => '/particuliers/coaching/{slug}', 'nl' => '/particulieren/coaching/{slug}', 'en' => '/individuals/coaching/{slug}'], name: 'app_private_coaching')]
//    public function privateCoaching($slug, PrivateCoachingRepository $privateCoachingRepository, Request $request): Response
//    {
//        $privateCoaching = $privateCoachingRepository->findOneConfBySlugAndByLocale($slug, $request->getLocale());
//
//        return $this->render('conference/conference.html.twig', [
//            'conference' => $privateCoaching,
//            'color' => self::PRIVATE_COLOR
//        ]);
//    }


    #[Route(['fr' => '/conferences/conferenciers', 'nl' => '/keynotes/sprekers', 'en' => '/keynotes/speakers'], name: 'app_conference_speakers')]
    public function getSpeakers(SpeakerRepository $speakerRepository, Request $request): Response
    {
        $lang = $request->getLocale();

        switch ($lang){
            case 'fr':
                return $this->redirect('https://www.50spoons.com/fr/conferences/conferenciers');
            case 'nl':
                return $this->redirect('https://www.50spoons.com/nl/keynotes/sprekers');
            default:
                return $this->redirect('https://www.50spoons.com/en/keynotes/speakers');
        }
//        $speakers = $speakerRepository->findAllSpeakersGetSimpleDataByLocaleOrderByImportance($request->getLocale());
//
//
//        $form = $this->createForm(NewsletterFormType::class);
//
//        return $this->render('conference/speakers.html.twig', [
//            'speakers' => $speakers,
//            'form' => $form->createView(),
//        ]);
    }

//    #[Route(['fr' => '/conferences/conferenciers/{id}', 'nl' => '/keynotes/sprekers/{id}', 'en' => '/keynotes/speakers/{id}'], name: 'app_conference_speaker')]
//    public function getSpeaker($id, SpeakerRepository $speakerRepository, Request $request, EntityManagerInterface $entityManager): Response
//    {
//        $locale = $request->getLocale();
//        $speaker = $speakerRepository->findOneSpeakerGetFullDataByLocaleOrderByImportance($locale, $id);
//        if (empty($speaker))
//        {
//            throw new NotFoundHttpException();
//        }
//        $businessConf = $entityManager->getRepository(BusinessConference::class)->findNameAndSlugByLocaleFromConfBySpeakerId($id, $locale);
//        $businessWorkshop = $entityManager->getRepository(BusinessWorkshop::class)->findNameAndSlugByLocaleFromConfBySpeakerId($id, $locale);
//        $privateRetreat = $entityManager->getRepository(PrivateRetreat::class)->findNameAndSlugByLocaleFromConfBySpeakerId($id, $locale);
//        $privateCoaching = $entityManager->getRepository(PrivateCoaching::class)->findNameAndSlugByLocaleFromConfBySpeakerId($id, $locale);
//        $privateWorkshop = $entityManager->getRepository(PrivateWorkshop::class)->findNameAndSlugByLocaleFromConfBySpeakerId($id, $locale);
//
//        $form = $this->createForm(NewsletterFormType::class);
//
//        return $this->render('conference/speaker.html.twig', [
//            'speaker' => $speaker,
//            'businessConf' => $businessConf,
//            'businessWorkshop' => $businessWorkshop,
//            'privateRetreat' => $privateRetreat,
//            'privateCoaching' => $privateCoaching,
//            'privateWorkshop' => $privateWorkshop,
//            'form' => $form->createView(),
//        ]);
//    }
}
