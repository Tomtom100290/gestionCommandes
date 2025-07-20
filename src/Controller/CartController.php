<?php

namespace App\Controller;

use App\Classe\PrepaCommande;
use App\Repository\ProduitRepository;
use PHPUnit\Event\Test\Prepa;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
final class CartController extends AbstractController
{
    #[Route('/prepcommande', name: 'app_prepa')]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig');
    }

    #[Route('/prepOrder/add/{id}', name: 'app_prepa_add')]
    public function add($id, PrepaCommande $prepaCommande, ProduitRepository $produitRepository): Response
    {   
        $produit = $produitRepository->findOneById($id); 

        $prepaCommande->add($produit);
        dd('produit ajouté au panier');
    }
}
