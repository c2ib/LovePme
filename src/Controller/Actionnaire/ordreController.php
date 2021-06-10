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
}