<?php
namespace App\Controller;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\Routing\Annotation\Route;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;
//pour permettre d'utiliser le repo
use App\Repository\ListingRepository;

class HomeController extends AbstractController
{


  


    #[Route('/', name: "home")]
public function index(ListingRepository $listingRepository): Response
{
    $productsHouses = $listingRepository->findby(
            ['propertyType' => 1], //correspond a: house

            ['createdAt' => 'ASC'], //pour l'ordre
            3,                       // limit par page
        );
    $productsApartments = $listingRepository->findby(
            ['propertyType' => 2], //correspond a: house

            ['createdAt' => 'ASC'], //pour l'ordre
            3,                       // limit par page
        );




    return $this->render('home.html.twig',[
        'productsHouses' => $productsHouses,
        'productsApartments' => $productsApartments
    ]);
}
}