<?php

namespace App\Controller;

use App\Entity\TypeTransaction;
use App\Form\TypeTransactionType;
use App\Repository\TypeTransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/transaction")
 */
class TypeTransactionController extends AbstractController
{
    /**
     * @Route("/", name="type_transaction_index", methods={"GET"})
     */
    public function index(TypeTransactionRepository $typeTransactionRepository): Response
    {
        return $this->render('type_transaction/index.html.twig', [
            'type_transactions' => $typeTransactionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_transaction_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeTransaction = new TypeTransaction();
        $form = $this->createForm(TypeTransactionType::class, $typeTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('type_transaction_index');
        }

        return $this->render('type_transaction/new.html.twig', [
            'type_transaction' => $typeTransaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_transaction_show", methods={"GET"})
     */
    public function show(TypeTransaction $typeTransaction): Response
    {
        return $this->render('type_transaction/show.html.twig', [
            'type_transaction' => $typeTransaction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_transaction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeTransaction $typeTransaction): Response
    {
        $form = $this->createForm(TypeTransactionType::class, $typeTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_transaction_index');
        }

        return $this->render('type_transaction/edit.html.twig', [
            'type_transaction' => $typeTransaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_transaction_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeTransaction $typeTransaction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeTransaction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_transaction_index');
    }
}
