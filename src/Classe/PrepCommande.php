<?php
namespace App\Classe;

use Symfony\Component\HttpFoundation\RequestStack;

class PrepaCommande 
{
   /* public function __construct(private RequestStack $requestStack){

    }*/
    public function add($produit){

           // $session = $this->requestStack->getSession();
            dd($produit);

    }
}