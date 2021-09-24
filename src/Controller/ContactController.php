<?php

namespace App\Controller;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

use App\Framework\AbstractController;


class ContactController extends AbstractController{

    public function index(){
        
        if(!empty($_POST)){
            
            $email = trim($_POST['email']);
            $fisrtname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $message = trim($_POST['message']);

            ob_start();
            require '/Users/hlihla/Desktop/WEBFORCE3/PHP/PHP blog/templates/email_contact.phtml';
            $html = ob_get_clean();
        
            $transport = Transport::fromDsn(MAILER_DSN);
            $mailer = new Mailer($transport);
    
            $email = (new Email())
                        ->from($email)
                        ->to('you@example.com')
                        ->subject('new message')
                        ->text($message)
                        ->html($html);
                    
        $mailer->send($email);
        $this->addFlash('votre message a bien été envoyé');
           
        }

       
        return $this->render('contact');
         
    }

   
}