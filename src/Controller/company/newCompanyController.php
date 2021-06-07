<?php

namespace App\Controller\company;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class newCompanyController extends AbstractController
{
    /**
     * @Route("/company/new/company", name="company_new_company")
     */
    public function index(): Response
    {
        return $this->render('company/new_company/index.html.twig', [
            'controller_name' => 'newCompanyController',
        ]);
    }
}