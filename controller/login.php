<?php
if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors=[];
    $user=checkCredentials($email,$password);

   if($user){
        register(
            $user['id_user'],
            $user['firstname'],
            $user['lastname'],
            $user['email']
        );
        addFlash('connexion reussie');
       
        header('Location: '. url('/'));
        exit;
    }else{
        $errors[]='identifiants incorrects';
    } 

}  
 
$template = 'login';
require ('/Users/hlihla/Desktop/WEBFORCE3/PHP/templates/base.phtml');


