<?php

namespace App\Controller;

use App\Entity\TypeTitle;
use App\Form\TypeTitleType;
use App\Repository\TypeTitleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/title")
 */
class TypeTitleController extends AbstractController
{
    /**
     * @Route("/", name="type_title_index", methods={"GET"})
     */
    public function index(TypeTitleRepository $typeTitleRepository): Response
    {
        die('titi');
        return $this->render('type_title/index.html.twig', [
            'type_titles' => $typeTitleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_title_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeTitle = new TypeTitle();
        $form = $this->createForm(TypeTitleType::class, $typeTitle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // die('titi');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeTitle);
            $entityManager->flush();

            return $this->redirectToRoute('type_title_index');
        }

        return $this->render('type_title/new.html.twig', [
            'type_title' => $typeTitle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_title_show", methods={"GET"})
     */
    public function show(TypeTitle $typeTitle): Response
    {
        return $this->render('type_title/show.html.twig', [
            'type_title' => $typeTitle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_title_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeTitle $typeTitle): Response
    {
        $form = $this->createForm(TypeTitleType::class, $typeTitle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_title_index');
        }

        return $this->render('type_title/edit.html.twig', [
            'type_title' => $typeTitle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_title_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeTitle $typeTitle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeTitle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeTitle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_title_index');
    }
}
