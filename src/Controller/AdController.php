<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdController extends AbstractController
{
    #[Route('/new', name: 'new ad')]
    public function add(): Response
    {
        return $this->render('ad/new.html.twig', [
           
        ]);
    }


        #[Route('/edit', name: 'edit ad')]
    public function edit(): Response
    {
        return $this->render('ad/edit.html.twig', [
           
        ]);
    }

            #[Route('/delete', name: 'delete ad')]
    public function delete(): Response
    {
        return $this->render('ad/delete.html.twig', [
           
        ]);
    }
}
