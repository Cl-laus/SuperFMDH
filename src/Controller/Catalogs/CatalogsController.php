<?php
namespace App\Controller\Catalogs;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\Routing\Annotation\Route;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;

class ApartmentsController extends AbstractController
{
    #[Route('/apartments', name: "apartments")]
public function apartments(): Response
{
    return $this->render('catalogs/apartments.html.twig',[
        
    ]);
}


    #[Route('/houses', name: "houses")]
public function house(): Response
{
    return $this->render('catalogs/houses.html.twig',[
        
    ]);
}


    #[Route('/favorites', name: "favorites")]
public function favorites(): Response
{
    return $this->render('catalogs/favorites.html.twig',[
        
    ]);
}

}