<?php
namespace App\Controller\Logs;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\HttpFoundation\Response;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: "register")]
public function index(): Response
{
    return $this->render('logs/register.html.twig',[
        
    ]);
}
}