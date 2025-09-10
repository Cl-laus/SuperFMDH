<?php
namespace App\Controller\Catalogs;

//pour  recupe la class mere des controlleurs
use App\Repository\ListingRepository;
//pour  les routes dans les parametres des methodes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;
//pour permettre d'utiliser le repo
use Symfony\Component\Routing\Annotation\Route;







class HousesController extends AbstractController
{





    #[Route('/houses', name: "houses")]
    public function index(ListingRepository $listingRepository): Response
    {

        $products = $listingRepository->findby(
            ['propertyType' => 1],   //correspond a: house
            ['createdAt' => 'DESC'], //pour l'ordre
            6,                       // limit par page
            0 //decalage(a regler plus tard) 
            // (limit par page multiplier par le numero de page-1/ ex: pour page 1 : 6 *(1-1)=0; pour page 2: 6*(2-1)=6)
        );
        return $this->render('catalogs/houses.html.twig', ['products' => $products,

        ]);
    }
}
