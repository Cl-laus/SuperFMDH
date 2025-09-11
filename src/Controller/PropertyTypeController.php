<?php
namespace App\Controller;

use App\Entity\PropertyType;
use App\Repository\PropertyTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/property/type', name: 'property_type_')]
final class PropertyTypeController extends AbstractController
{
    #[Route('/show', name: 'show')]
    public function show(
        PropertyTypeRepository $propertyTypeRepository,
    ): Response {
        //recupere tous les types de bien en base de données
        $propertyTypes = $propertyTypeRepository->findAll();
        //rends la vue
        return $this->render('property_type/show.html.twig', [
            'controller_name' => 'PropertyTypeController',
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new (
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $propertyType = new PropertyType();

        $form = $this->createForm(PropertyType::class, $propertyType);
                if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($transactionType);
            $em->flush();

            

            return $this->redirectToRoute('transaction_type_show');
        }

        return $this->render('transaction_type/new.html.twig', [
            'form' => $form,
        ]);

    }
}
