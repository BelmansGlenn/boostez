<?php

namespace App\DataFixtures;

use App\Factory\BookFactory;
use App\Factory\BookReviewFactory;
use App\Factory\BusinessConferenceFactory;
use App\Factory\BusinessWorkshopFactory;
use App\Factory\ConferenceReviewFactory;
use App\Factory\PrivateRetreatFactory;
use App\Factory\PrivateWorkshopFactory;
use App\Factory\SpeakerFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        BusinessConferenceFactory::createMany(10);
        BusinessWorkshopFactory::createMany(10);
        PrivateWorkshopFactory::createMany(10);
        PrivateRetreatFactory::createMany(10);

        BookFactory::createMany(12);

        BookReviewFactory::createMany(10);

        ConferenceReviewFactory::createMany(10);

        $manager->flush();
    }
}
