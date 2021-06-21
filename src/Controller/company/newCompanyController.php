<?php

namespace App\Controller\company;
use App\Entity\Company;
use App\Form\NewCompanyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompanyRepository;

class newCompanyController extends AbstractController
{
    /**
     * @Route("/actionnaire/new/company", name="company_new_company")
     */
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
    /**
     * @Route("/actionnaire/company", name="company_liste")
     */
    public function listeCompany(CompanyRepository $companyRepo)
    {
        $companies = $companyRepo->findAll();
        if (!$companies) {
            throw $this->createNotFoundException('La table est vide');
        }
        return $this->render('company/listeCompany.html.twig', [
        'companies' => $companies,
        ]);
    }
    
    /**
     * @Route("/actionnaire/company/{id}", name="company_details")
     */
    public function DetailsCompany(int $id)
    {
        $company = $this->getDoctrine()
            ->getRepository(Company::class)
            ->find($id);
        if (!$company) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }
        return $this->render('company/DetailsCompany.html.twig',[
            'company' =>$company ]);
    }
}