<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProduitController extends AbstractController
{
    #[Route('/produit/{slug}', name: 'app_produit')]
    public function index($slug, ProduitRepository $produitRepository ): Response
    {   
        $produits = $produitRepository->findOneBySlug($slug);// Recherche par slug
       
            
        //dd($slug);
        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
           
        ]);
    }
}
