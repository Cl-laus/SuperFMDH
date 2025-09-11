<?php
namespace App\Controller;

use App\Entity\Listing;
use App\Form\ListingType;
use App\Repository\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/listing', name: 'listing_')]

final class ListingController extends AbstractController
{
    ///////////////////////////SHOW METHOD//////////////////////////////////////
    
        #[Route('/show/{id}', name: 'show', requirements: ['id' => '\d+'])]
        public function show(
            #[MapEntity(id: "id")]
            Listing $listing,
            ListingRepository $listingRepository
        ): Response {
            return $this->render('listing/show.html.twig', [
                'product' => $listing,
            ]);
        }

    ///////////////////////////NEW METHOD//////////////////////////////////////
    #[Route('/new', name: 'new')]
    public function new (
        EntityManagerInterface $entityManager,
        Request $request,

    ): response {

        $listing = new Listing();

        $form = $this->createForm(ListingType::class, $listing);
        $form->handleRequest($request);

        //verifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($listing);
            $entityManager->flush();

            return $this->redirectToRoute('home', []); // renvoi a la page d'accueil si formulaire ok
        }

        return $this->render('listing/new.html.twig', [
            'form' => $form,
        ]);
    }


    ///////////////////////////EDIT METHOD////////////////////////////////////// A TERMINER
    #[Route('/edit/{id}', name: 'edit', requirements: ['id' => '\d+'])]
    public function edit(
        Request $request,
        EntityManagerInterface $entityManager,
        #[MapEntity(id: "id")] Listing $listing
    ): Response {
    

        $form = $this->createForm(ListingType::class, $listing);
        $form->handleRequest($request);

        //verifie si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($listing);
            $entityManager->flush();

            return $this->redirectToRoute('home', []); // renvoi a la page d'accueil si formulaire ok
        }

        return $this->render('listing/new.html.twig', [
            'form' => $form,
        ]);

    }

    ///////////////////////////DELETE METHOD////////////////////////////////////// A TERMINER
    #[Route('/delete/{id}', name: 'delete', requirements: ['id' => '\d+'])]
    public function delete(
        #[MapEntity(id: "id")] Listing $listing,
        EntityManagerInterface $entityManager
    ): Response {
        // Suppression de l'annonce
        $entityManager->remove($listing);
        $entityManager->flush();
        // Rediriger vers l'accueil après suppression
        return $this->redirectToRoute('home');
    }

}
