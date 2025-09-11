<?php
namespace App\Controller;

use App\Entity\TransactionType;
use App\Form\TransactionTypeType as TransactionTypeForm;

use App\Repository\TransactionTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transaction_type', name: 'transaction_type_')]

final class TransactionTypeController extends AbstractController
{
    #[Route('/show', name: 'show')]
    public function show(
        TransactionTypeRepository $transactionTypeRepository
    ): Response {
        $transactionTypes = $transactionTypeRepository->findAll();

        return $this->render('transaction_type/show.html.twig', [
            'edit_route' => 'transaction_type_edit', // renvoi un chemin different selon le controller; car le tableau est le meme pour les deux
            'types'      => $transactionTypes,       // renvoi la meme variables mais pas avec les memes valeurs
        ]);
    }



    
    #[Route('/new', name: 'new')]
    public function new (
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $transactionType = new TransactionType();

        $form = $this->createForm(TransactionTypeForm::class, $transactionType);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($transactionType);
            $em->flush();

            return $this->redirectToRoute('transaction_type_show');
        }

        return $this->render('transaction_type/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', requirements: ['id' => '\d+'])]
    public function edit(
        #[MapEntity(id: "id")] TransactionType $transactionType,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(TransactionTypeForm::class, $transactionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($transactionType);
            $em->flush();

            return $this->redirectToRoute('transaction_type_show');
        }

        return $this->render('transaction_type/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
