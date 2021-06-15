<?php

namespace App\Controller;

use App\Entity\FormeLegale;
use App\Form\FormeLegaleType;
use App\Repository\FormeLegaleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forme/legale")
 */
class FormeLegaleController extends AbstractController
{
    /**
     * @Route("/", name="forme_legale_index", methods={"GET"})
     */
    public function index(FormeLegaleRepository $formeLegaleRepository): Response
    {
        return $this->render('forme_legale/index.html.twig', [
            'forme_legales' => $formeLegaleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="forme_legale_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formeLegale = new FormeLegale();
        $form = $this->createForm(FormeLegaleType::class, $formeLegale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formeLegale);
            $entityManager->flush();

            return $this->redirectToRoute('forme_legale_index');
        }

        return $this->render('forme_legale/new.html.twig', [
            'forme_legale' => $formeLegale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forme_legale_show", methods={"GET"})
     */
    public function show(FormeLegale $formeLegale): Response
    {
        return $this->render('forme_legale/show.html.twig', [
            'forme_legale' => $formeLegale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="forme_legale_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FormeLegale $formeLegale): Response
    {
        $form = $this->createForm(FormeLegaleType::class, $formeLegale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forme_legale_index');
        }

        return $this->render('forme_legale/edit.html.twig', [
            'forme_legale' => $formeLegale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forme_legale_delete", methods={"POST"})
     */
    public function delete(Request $request, FormeLegale $formeLegale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formeLegale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formeLegale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('forme_legale_index');
    }
}
