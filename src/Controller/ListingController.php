<?php
namespace App\Controller;

use App\Repository\ListingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/listing', name: 'listing_')]

final class ListingController extends AbstractController
{
    #[Route('/new', name: 'new')]
    public function add(): Response
    {
        return $this->render('listing/new.html.twig', [

        ]);
    }

    #[Route('/show/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(
        #[MapEntity(id: "id")] Listing $listing,
        ListingRepository $listingRepository
    ): Response {
        return $this->render('listing/show.html.twig', [
            'product' => $listing,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', requirements: ['id' => '\d+'])]
    public function edit(int $id): Response
    {
        //utiliser $id pour récupérer l'annonce
        return $this->render('listing/edit.html.twig', [
            'id' => $id,
        ]);
        return $this->redirectToRoute('listing_show');
    }

    #[Route('/delete/{id}', name: 'delete', requirements: ['id' => '\d+'])]
    public function delete(int $id): RedirectResponse
    {
        // Suppression de l'annonce

        // Rediriger vers l'accueil après suppression
        return $this->redirectToRoute('home');
    }

}
