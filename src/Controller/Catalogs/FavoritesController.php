<?php
namespace App\Controller\Catalogs;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\Routing\Annotation\Route;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;

class FavoritesController extends AbstractController
{
    #[Route('/favorites', name: "favorites")]
public function index(): Response
{
    return $this->render('catalogs/favorites.html.twig',[
        
    ]);
}
}