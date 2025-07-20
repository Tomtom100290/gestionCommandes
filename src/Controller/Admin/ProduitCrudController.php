<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

      public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Produit')
            ->setEntityLabelInPlural('Produits')
            ;
    }
    
    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('Nom'),
            SlugField::new('slug')->setLabel("URL")->setTargetFieldName('Nom')->setHelp('URL de votre catégorie créer automatiquement'),//Créer le slug automatiquement grace au "SlugField"
            TextEditorField::new('description'),
            ImageField::new('illustration')->setLabel('Image')->setHelp('Image du produit 600 X 600 px')->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]')->setBasePath('/Uploads')->setUploadDir('/public/Uploads'),//Pour que l'image s'affiche dans le tableau, on utilise "setBasePath('/Uploads')". Donne le bon chemin de l'image
            NumberField::new('PrixHT')->setLabel('Prix HT'),
            ChoiceField::new('tva')->setLabel('Taux de TVA')->setChoices([
                '5,5%' => '5.5',
                '8,5%' => '8.5',
                '12,5%' => '12.5'

            ]),
            AssociationField::new('categoryfk')->setLabel('Catégorie associée')

        ];
    }
    
}
