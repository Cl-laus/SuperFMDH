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

#[Route('/transaction-type', name: 'transaction_type_')]
class TransactionTypeController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(
        TransactionTypeRepository $transactionTypeRepository
    ): Response {
        $transactionTypes = $transactionTypeRepository->findAll();

        return $this->render('transaction_type/index.html.twig', [
            'transactionTypes' => $transactionTypes,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new (
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $transactionType = new TransactionType();

        $form            = $this->createForm(TransactionTypeForm::class, $transactionType);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                        //gere les dates hors du formulaire
            $transactionType->setCreatedAt(new \DateTime());
            $transactionType->setUpdatedAt(new \DateTime());
            $em->persist($transactionType);
            $em->flush();

            

            return $this->redirectToRoute('transaction_type_index');
        }

        return $this->render('transaction_type/new.html.twig', [
            'form' => $form,
        ]);
    }
}
