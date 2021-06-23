<?php

//si le formulaire est soumis
if(!empty($_POST)){
    //recuperer les données du formulaire
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email= trim($_POST['email']);
    $password= $_POST['password'];
   


   //valider les données du formulaire
   $errors=[];
   if(!$firstname){
       $errors[] = 'le champ prénom est obligatoire';
   }

   if(!$lastname){
    $errors[] = 'le champ nom est obligatoire';
   }

   if(!$email){
    $errors[] = 'le champ email est obligatoire';
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors[] = $email . " n'est pas un email valide";
  }elseif(getUserByEmail($email)){
      $errors[]= "l'utilisateur existe déja";

  }

  if(strlen($password)< 8){
      $errors[]= 'Le mot de passe doit comporter au moins 8 caractéres';
  }
  

   //si tout est ok ..
    if(empty($errors)) {
        //hashage mot de passe
        $hash = password_hash($password,PASSWORD_DEFAULT);

       //on insert les données dans la bdd
       createUser($firstname,$lastname,$email,$hash );

       //message de confirmation
         addFlash('compte créé avec succés ! Vous pouvez vous connecter');

      //redirection vers la page d'accueil  
      header('Location: '. url('/login'));
       exit;
    } 

       
}       


$template = 'signup';
require '/Users/hlihla/Desktop/WEBFORCE3/PHP/templates/base.phtml';

?>