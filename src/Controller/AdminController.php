<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(Request  $request): Response
    {

       $roles = [
                        0=>"ROLE_USER",
                        1=>"ROLE_ADMIN ",
                        2=>"ROLE_EDITOR"
        ];


        $user = $this->getUser();
        //$user2 = new User();
        //dd($user);

//        $user_roles=$user->setRoles(array('ROLE_USER','ROLE_ADMIN'));
//        $roles=$user->getRoles();
//        dump($request->request->get('role'));
        if ($request->getMethod() == "POST") {
            $role = $roles[$request->request->get('role')];
//            dd(array($role));
            //dd($user);
            $user->setRoles(array($role));
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            dump($user->getRoles());
//            dump($user2->getRoles());
        } else {
           // dump($user->getRoles());
        }


        return $this->render('admin/index.html.twig', [
            'roles' => $roles,
        ]);
    }
}
