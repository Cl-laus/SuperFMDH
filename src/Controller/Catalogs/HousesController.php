<?php
namespace App\Controller\Catalogs;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\Routing\Annotation\Route;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;

class HousesController extends AbstractController
{
    #[Route('/houses', name: "houses")]
public function index(): Response
{
    return $this->render('catalogs/houses.html.twig',[
        
    ]);
}
}