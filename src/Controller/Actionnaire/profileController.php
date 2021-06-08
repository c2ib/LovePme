<?php

namespace App\Controller\Actionnaire;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class profileController extends AbstractController
{
    /**
     * @Route("/actionnaire/profile", name="actionnaire_profile")
     */
    public function index(): Response
    {
        return $this->render('actionnaire/profile/index.html.twig');
    }
    
}