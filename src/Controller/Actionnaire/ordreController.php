<?php

namespace App\Controller\Actionnaire;
use App\Controller\Actionnaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Ordre;
use App\Entity\User;
use App\Form\OrdreType;
use App\Repository\OrdreRepository;

class ordreController extends AbstractController
{
    /**
     * @Route("/actionnaire/annonces/ajout", name="users_annonces_ajout")
     */
    public function ajoutAnnonce(Request $request)
    {
        $annonce = new Ordre;

        $form = $this->createForm(OrdreType::class, $annonce);

        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $annonce->setIdUser($this->getUser());
                $em = $this->getDoctrine()->getManager();
                $em->persist($annonce);
                $em->flush();

                return $this->redirectToRoute('actionnaire_profile');
            }

            return $this->render('actionnaire/ordre/ajout.html.twig', [
                'formAnnonce' => $form->createView(),
            ]);
        }

    /**
     * @Route("/backoffice/annonces", name="liste_annonces")
     */
    public function listeAnnonce(OrdreRepository $ordreRepo)
    {
        $annonces = $ordreRepo->findAll();
        if (!$annonces) {
            throw $this->createNotFoundException('La table est vide');
        }
        return $this->render('backoffice/listeAnnonce.html.twig', [
        'annonces' => $annonces,
        ]);
}
    /**
     * @Route("/backoffice/annonces/{id}", name="Details_Annonces")
     */
    public function DetailsAnnonce(int $id)
    {
        // mes tests
        $annonce = $this->getDoctrine()
        ->getRepository(Ordre::class)
        ->find($id);
        if (!$annonce) {
            throw $this->createNotFoundException('id existe pas');
        }
        return $this->render('backoffice/detailsAnnonce.html.twig', [
        'annonce' => $annonce,
        ]);
}
}