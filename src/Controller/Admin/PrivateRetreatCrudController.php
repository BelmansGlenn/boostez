<?php

namespace App\Controller\Admin;

use App\Entity\PrivateRetreat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrivateRetreatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrivateRetreat::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('name', 'Nom du bouton'),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),
            TextField::new('title', 'Titre'),
            ChoiceField::new('targetedAudience', 'Public visé')
                ->setChoices(['pour les particuliers' => 'pour les particuliers',
                    'voor individuen' => 'voor individuen',
                    'for individuals' => 'for individuals']),
            TextField::new('video', 'Video')->hideOnIndex(),
            ArrayField::new('point', 'Point')->hideOnIndex(),
            ChoiceField::new('language', 'Langue')->setChoices(['FR'=>'FR','NL'=>'NL','EN'=>'EN']),
            IntegerField::new('inOrder', 'Ordre'),
            BooleanField::new('isVisible', 'Est visible?')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['language'=>'DESC', 'inOrder' => 'ASC']);
    }
}
