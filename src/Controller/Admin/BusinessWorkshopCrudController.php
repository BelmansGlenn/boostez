<?php

namespace App\Controller\Admin;

use App\Entity\BusinessWorkshop;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BusinessWorkshopCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BusinessWorkshop::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('name', 'Nom du bouton'),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),
            TextField::new('title', 'Titre'),
            ChoiceField::new('targetedAudience', 'Public visé')
                ->setChoices(['pour les entreprises' => 'pour les entreprises',
                    'voor bedrijven' => 'voor bedrijven', 'for companies' =>'for companies']),
            TextField::new('video', 'Video')->hideOnIndex(),
            TextField::new('point1', 'Point 1')->hideOnIndex(),
            TextField::new('point2', 'Point 2')->hideOnIndex(),
            TextField::new('point3', 'Point 3')->hideOnIndex(),
            TextField::new('point4', 'Point 4')->hideOnIndex()->setRequired(false),
            TextField::new('point5', 'Point 5')->hideOnIndex()->setRequired(false),
            TextField::new('point6', 'Point 6')->hideOnIndex()->setRequired(false),
            TextField::new('point7', 'Point 7')->hideOnIndex()->setRequired(false),
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
