<?php

namespace App\Controller;

use App\Repository\CompanyRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CompanyRepository  $companyRepository, Request $request): Response
    {
       // dd($request::createFromGlobals());

        return $this->render('home/index.html.twig', [
            'compa' => $companyRepository->findAll(),
            'controller_name' => 'HomeController',
        ]);
    }
}
