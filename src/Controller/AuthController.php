<?php
 namespace App\Controller;

 use App\Framework\AbstractController;



 class AuthController extends AbstractController{

    public function Login(){
        if(!empty($_POST)){
            
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $errors=[];
            $user=checkCredentials($email,$password);
        
           if($user){
               
               $this->userSession ->register(
                    $user['id_user'],
                    $user['firstname'],
                    $user['lastname'],
                    $user['email'],
                    $user['role']
                );
               
                $this->addFlash('connexion reussie');
               
                header('Location: '. url('/'));
                exit;
            }else{
                $errors[]='identifiants incorrects';
            } 
        
        }  
         
        $template = 'login';
        require ('../templates//base.phtml');
        
    }
    public function logout(){
           //Deconnexion
           
           $this->userSession->logout();
          
           $this->addFlash('vous êtes déconnecté'); //methode heritée

            //Redirection
            header('Location: '. url('/'));
            exit;

    }
 }
