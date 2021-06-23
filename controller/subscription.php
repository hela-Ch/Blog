<?php

if(!empty($_POST)){
    $email = $_POST['email'];
    

    $errors=[];
 
    if(!$email){
        $errors[] = 'le champ email est obligatoire';
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors[] = $email . " n'est pas un email valide";
      }elseif(verifyUserisAlreadySubscripted($email)){
          $errors[]= "vous etes deja inscrits";
    
      }else{
          addUserToNewsletter($email);
          addFlash('subscription done');
          header('Location: '. url('/'));
          exit;
        }
}
//require ('/Users/hlihla/Desktop/WEBFORCE3/PHP/templates/base.phtml');
require('/Users/hlihla/Desktop/WEBFORCE3/PHP/controller/home.php');