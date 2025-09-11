<?php
namespace App\Controller;

use App\Entity\PropertyType;
use App\Form\PropertyTypeType as PropertyTypeForm;
use App\Repository\PropertyTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/property_type', name: 'property_type_')]
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
            'edit_route' => 'transaction_type_edit', // renvoi un chemin different selon le controller; car le tableau est le meme pour les deux
            'types'      => $propertyTypes,          // renvoi la meme variables mais pas avec les memes valeurs
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new (
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $propertyType = new PropertyType();

        $form = $this->createForm(PropertyTypeForm::class, $propertyType);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($propertyType);
            $em->flush();

            return $this->redirectToRoute('property_type_show');
        }

        return $this->render('property_type/new.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/edit/{id}', name: 'edit', requirements: ['id' => '\d+'])]
    public function edit(
        #[MapEntity(id: "id")] PropertyType $propertyType,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(PropertyTypeForm::class, $propertyType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($propertyType);
            $em->flush();

            return $this->redirectToRoute('property_type_show');
        }

        return $this->render('property_type/edit.html.twig', [
            'form' => $form,
        ]);
    }

}
