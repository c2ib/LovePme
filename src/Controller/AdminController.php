<?php

namespace App\Controller;

use App\Entity\Civilite;
use App\Entity\Type;
use App\Form\CiviliteType;
use App\Repository\CiviliteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/civil", name="civil")
     */
    public function makeCivil(Request $request, UserRepository $userRepository, CiviliteRepository $civiliteRepository){

        $civilite = new Civilite();
        $form = $this->createForm(CiviliteType::class, $civilite);

//        $civlist=$this->getDoctrine()->getRepository('Civilite');
        //$users=$userRepository->findAll();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //dd($civilite);
            $em = $this->getDoctrine()->getManager();
            $em->persist($civilite);
            $em->flush();
        }

        $civilites=$civiliteRepository->findAll();

        return $this->render('admin/civil.html.twig', array(
            'form' => $form->createView(),
            'civilite' => $civilites
            ));

    }

    /**
     * @Route("/type", name="type")
     */
    public function makeType(){
        $type = new Type();


        return $this->render('admin/type.html.twig');
    }
}
