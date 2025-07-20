<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Categorie')
            ->setEntityLabelInPlural('Categories')
            ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom')->setLabel("Titre")->setHelp('Titre de la catégorie'),
            SlugField::new('slug')->setLabel("URL")->setTargetFieldName('nom')->setHelp('URL de votre catégorie créer automatiquement')//Créer le slug automatiquement grace au "SlugField"
            
        ];
    }
    
}
