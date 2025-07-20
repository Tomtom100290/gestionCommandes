<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategorieController extends AbstractController
{
    #[Route('/categorie/{slug}', name: 'app_categorie')]//L'argument "slug" est ajouté a la suite de l'url "categorie/" répliqué dans l'argument de la fonction
    public function index($slug, CategorieRepository $categorieRepository): Response
    {   

        $categories = $categorieRepository->findOneBySlug($slug);// Recherche par slug
            //dd($categories);
        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    /*#[Route('/categorie/{slug}', name: 'app_categorie')]//L'argument "slug" est ajouté a la suite de l'url "categorie/" répliqué dans l'argument de la fonction
    public function index($slug, CategorieRepository $categorieRepository): Response
    {   

        $categories = $categorieRepository->findAll();// Recherche par slug

        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }*/
}

//Role du fichier repository
// 1 ouvre une connexion avec la BDD
// 2 Connexion à la table qui s'appel Categorie
// 3 Execute une action en Bdd
// Graca à l'injection de dépendance