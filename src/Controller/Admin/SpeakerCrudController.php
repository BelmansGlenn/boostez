<?php

namespace App\Controller\Admin;

use App\Entity\Speaker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SpeakerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Speaker::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('image', 'Image')
                ->setBasePath('uploads/images/speakers')
                ->setUploadDir('public/uploads/images/speakers')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom de famille'),
            TextEditorField::new('descriptionFR', 'Description Francais'),
            TextEditorField::new('descriptionNL', 'Description Neerlandais')->hideOnIndex(),
            TextEditorField::new('descriptionEN', 'Description Anglais')->hideOnIndex(),
            ArrayField::new('conferenceFR', 'Conference Francais')->setRequired(false),
            ArrayField::new('conferenceNL', 'Conference Neerlandais')->hideOnIndex()->setRequired(false),
            ArrayField::new('conferenceEN', 'Conference Anglais')->hideOnIndex()->setRequired(false),
            ChoiceField::new('language', 'Langues')
                ->setChoices(['FR'=>'FR', 'NL'=>'NL', 'EN'=>'EN'])
                ->allowMultipleChoices(),
            IntegerField::new('inOrder', 'Ordre'),
            BooleanField::new('isVisible', 'Est visible?')
        ];
    }
}
