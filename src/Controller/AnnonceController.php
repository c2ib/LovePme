<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(Request $request): Response
    {
        $annonce=new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){
            $annonce->setIduser($this->getUser());
            $annonce->setCreatedAt(new \DateTime() );
            $annonce->setUpdatedAt(new \DateTime() );
           // dd($annonce);
            $em=$this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush();

            $this->addFlash('success','annonce publiée pour '.$annonce->getAction()->getSociete());

            return $this->redirectToRoute('home');
        }

        return $this->render('annonce/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
