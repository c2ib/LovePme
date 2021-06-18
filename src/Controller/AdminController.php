<?php

namespace App\Controller;

use App\Entity\Civil;
use App\Entity\Civilite;
use App\Entity\RegistreTitre;
use App\Entity\Type;
use App\Form\CiviliteType;
use App\Form\CivilType;
use App\Form\RegistreType;
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
     * @Route("/attribution", name="attribution")
     */
    public function attributionAction(){
        $form=$this->createForm();
    }

    /**
     * @Route("/registre/actions", name="registre_actions")
     */
    public function giveActions(Request $request){
        //$user = $this->getUser();
        $registre = new RegistreTitre();
        $form= $this->createForm(RegistreType::class,$registre);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           // dd($registre->getAction());
            //dd($registre->getAction()['societe']->getName());
            $em=$this->getDoctrine()->getManager();
            $registre->setCreatedAt(new \DateTime());
            //dd($registre);
            $em->persist($registre);
            $em->flush();

            $this->addFlash('success',$registre->getQuantity().' actions transmises sans erreur');

                return $this->redirectToRoute('home');
        }

        return $this->render('registre/index.html.twig',array(
            'form' => $form->createView()
        ));

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

    /**
     * @Route("/civily", name="civil")
     */
    public function civilCreate(Request $request){
        $civil = new Civil();
        $form = $this->createForm(CivilType::class,$civil);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
              //dd($civil);
              $em=$this->getDoctrine()->getManager();
              $em->persist($civil);
              $em->flush();
            }

            return $this->render('admin/civil.html.twig',array('form' => $form->createView()));
    }
}
