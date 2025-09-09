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
    $products = $listingRepository -> findall();
    return $this->render('home.html.twig',[
        'products' => $products,
    ]);
}
}