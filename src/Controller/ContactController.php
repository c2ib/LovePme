<?php

namespace App\Controller;
use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    /**
     * @Route("actionnaire/contact", name="contact")
     */
    public function contacter(Request $request, MailerInterface $mailer): Response
    {
        $messages = new Contact();
        $form = $this->createForm(ContactType::class,$messages);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            // $em= $this->getDoctrine()->getManager();
            // $em->persist($messages);
            // $em->flush();
        $contactFormData= $form->getData()->getTitre();
        $email = (new Email())
	    ->from($this->getUser()->getEmail())
		->to('contact@ciib.fr')
		->cc('dimitrilouis@ciib.fr')
		->addCc('cedricanaky@ciib.fr')
		->bcc('mailtrapdev@example.com')
		->replyTo('mailtrap@example.com')
		->subject('Best practices of building HTML emails')
        ->text($form->getData()->getMessage());

        $mailer->send($email);
        $this->addFlash('success', 'Vore message a été envoyé');
        return $this->redirectToRoute('home');
    
        // $messages = new Contact();
        // $form = $this->createForm(ContactType::class,$messages);
        // $form->handleRequest($request);
        // if($form->isSubmitted() && $form->isValid()) {
        //     $em= $this->getDoctrine()->getManager();
        //     $em->persist($messages);
        //     $em->flush();
        //     $contactFormData= $form->getData();
        //     $message = (new Email());
        //     $mailer->send('gayegayemboup@gmail.com');
        //     $this->addFlash('success', 'Vore message a été envoyé');
        //     return $this->redirectToRoute('home');
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}