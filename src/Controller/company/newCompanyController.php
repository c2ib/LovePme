<?php

namespace App\Controller\company;
use App\Entity\Company;
use App\Form\NewCompanyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class newCompanyController extends AbstractController
{
    /**
     * @Route("/company/new/company", name="company_new_company")
     */
    // public function index(): Response
    // {
    //     return $this->render('company/new_company/index.html.twig', [
    //         'controller_name' => 'newCompanyController',
    //     ]);
    // }
    public function newCompany(Request $request): Response
    {
        $company = new Company();
        $form = $this->createForm(NewCompanyType::class, $company);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($company);
            $em->flush();

            return $this->redirectToRoute('home');

        }
        return $this->render('company/new_company/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}