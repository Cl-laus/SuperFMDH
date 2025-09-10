<?php
namespace App\Controller\Catalogs;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\Routing\Annotation\Route;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;


class CatalogsController extends AbstractController
{
    #[Route('/apartments', name: 'catalog_apartments')]
    public function apartments(): Response
    {
        return $this->render('catalogs/apartments.html.twig', [
//parametre a remplir
        ]);
    }

    #[Route('/houses', name: 'catalog_houses')]
    public function houses(): Response
    {
        return $this->render('catalogs/houses.html.twig', [
//parametre a remplir
        ]);
    }

    #[Route('/favorites', name: 'catalog_favorites')]
    public function favorites(): Response
    {
        return $this->render('catalogs/favorites.html.twig', [
//parametre a remplir
        ]);
    }
}
