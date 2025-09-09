<?php
namespace App\Controller;

use App\Entity\Listing;
use App\Entity\PropertyType;
use App\Entity\TransactionType;
use App\Repository\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/listing', name: 'listing_')]

final class ListingController extends AbstractController
{
    #[Route('/new', name: 'new')]
    public function new (
        EntityManagerInterface $entityManager,
        TransactionType $transactionType,
        PropertyType $propertyType

        )
    {

        $listing = new Listing();
        $listing->setTitle('test')
            ->setDescription('test')
            ->setCity('test')
            ->setPrice(50)
            ->setImageUrl('test')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setTransactionType($transactionType)
            ->setPropertyType($propertyType);

        $entityManager->persist($listing);
        $entityManager->flush();

        return $this->redirectToRoute('listing_show', ['id' => $listing->getId()]);
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
    public function edit(
        #[MapEntity(id: "id")] Listing $listing
    ): Response {
        //utiliser $id pour récupérer l'annonce
        return $this->render('listing/edit.html.twig', [
            'id' => $id,
        ]);

    }

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
