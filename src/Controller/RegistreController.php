<?php

namespace App\Controller;

use App\Entity\Registre;
use App\Form\RegistreType;
use App\Repository\RegistreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/registre")
 */
class RegistreController extends AbstractController
{
    /**
     * @Route("/", name="registre_index", methods={"GET"})
     */
    public function index(RegistreRepository $registreRepository, Request $request): Response
    {
       // dd($request::createFromGlobals());
        $registres = $registreRepository->findAll();
        //dd($registres);
        return $this->render('registre/index.html.twig', [
            'registres' => $registreRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="registre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $registre = new Registre();
        $form = $this->createForm(RegistreType::class, $registre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $registre->setCreatedAt(new \DateTime());
            $entityManager->persist($registre);
            $entityManager->flush();

            return $this->redirectToRoute('registre_index');
        }

        return $this->render('registre/new.html.twig', [
            'registre' => $registre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registre_show", methods={"GET"})
     */
    public function show(Registre $registre): Response
    {
        return $this->render('registre/show.html.twig', [
            'registre' => $registre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="registre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Registre $registre): Response
    {
        $form = $this->createForm(RegistreType::class, $registre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('registre_index');
        }

        return $this->render('registre/edit.html.twig', [
            'registre' => $registre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registre_delete", methods={"POST"})
     */
    public function delete(Request $request, Registre $registre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('registre_index');
    }
}
