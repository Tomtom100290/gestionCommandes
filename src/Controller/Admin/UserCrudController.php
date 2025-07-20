<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
            ;
    }
//Fonction ci dessous permet permet de gérer les modification sur la vu, les modification, de création , de listing
    public function configureFields(string $pageName): iterable
    {
        //Que peux modifier l'utilisateur ?
        return [
            TextField::new('prenom')->setLabel('Prénom'), //setLabel pour modifier le libellé du label d'un champ
            TextField::new('nom')->setLabel('Nom de famille'),
            TextField::new('email')->setLabel('Email')->onlyOnIndex() //Afficher l'emmail uniquement dans le tableau index de vue de l'ensemble des utilisateurs

            
        ];
    }
    
}
