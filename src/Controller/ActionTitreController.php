<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActionTitreController extends AbstractController
{
    /**
     * @Route("/action/titre", name="action_titre")
     */
    public function index(): Response
    {
        return $this->render('action_titre/index.html.twig', [
            'controller_name' => 'ActionTitreController',
        ]);
    }
}
