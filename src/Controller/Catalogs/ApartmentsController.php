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

class ApartmentsController extends AbstractController




{
    #[Route('/apartments', name: "apartments")]
    public function index(ListingRepository $listingRepository): Response
    {


        
        $products = $listingRepository->findby(
            ['propertyType' => 2], //correspond a: apartment

            ['createdAt' => 'DESC'], //pour l'ordre
            6,                       // limit par page
            0                        //decalage(a regler plus tard)

        );
        return $this->render('catalogs/apartments.html.twig', ['products' => $products,

        ]);
    }
}
