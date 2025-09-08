<?php
namespace App\Controller;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\Routing\Annotation\Route;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{


     public const PRODUCTS = [
        [
            'id' => 1,
            'title' => 'Charmant appartement T2',
            'description' => 'Bel appartement rénové avec goût, idéal pour un jeune couple ou étudiant. Proche du centre-ville et des transports.',
            'image_url' => 'https://img.freepik.com/photos-gratuite/maison-isolee-terrain_1303-23773.jpg?semt=ais_hybrid&w=740&q=80',
            'transaction_type' => 'rent',
            'price' => 750,
            'location' => 'Lyon',
        ],
        [
            'id' => 2,
            'title' => 'Maison familiale avec jardin',
            'description' => 'Grande maison de 120m² avec 4 chambres, garage double et jardin arboré. Quartier calme, proche des écoles.',
            'image_url' => 'https://img.freepik.com/photos-gratuite/maison-isolee-terrain_1303-23773.jpg?semt=ais_hybrid&w=740&q=80',
            'transaction_type' => 'sale',
            'price' => 325000,
            'location' => 'Grenoble',
        ],
        [
            'id' => 3,
            'title' => 'Studio meublé moderne',
            'description' => 'Studio de 25m² entièrement équipé, cuisine ouverte, salle de bain neuve. Internet inclus dans le loyer.',
            'image_url' => 'https://img.freepik.com/photos-gratuite/maison-isolee-terrain_1303-23773.jpg?semt=ais_hybrid&w=740&q=80',
            'transaction_type' => 'rent',
            'price' => 550,
            'location' => 'Chambéry',
        ]
    ];


    #[Route('/', name: "home")]
public function index(): Response
{
    return $this->render('home.html.twig',[
        'products' => self::PRODUCTS,
    ]);
}
}