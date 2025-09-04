<?php
namespace App\Controller\Logs;

//pour  recupe la class mere des controlleurs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//pour  les routes dans les parametres des methodes
use Symfony\Component\HttpFoundation\Response;
//pour permettre de renvoyer une Response dans les méthodes
use Symfony\Component\Routing\Annotation\Route;

class LogController extends AbstractController
{
    #[Route('/login', name: "login")]
    public function login(): Response
    {
        return $this->render('logs/login.html.twig', [
//parametre a remplir
        ]);

    }
#[Route('/logout', name: "logout")]
    public function logout(): Response
    {
        //definir son action
    }
}
