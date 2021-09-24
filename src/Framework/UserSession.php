<?php

namespace App\Framework;



class  UserSession extends AbstractSession {
  
   public  function  __construct(){
    parent::__construct();
    $this->checkSession();
   }

/**
 * Gestion de la session utilisateur
 */
    

    function register(int $userId,string $firstname,string $lastname,string $email,string $role)
    {
        
        $_SESSION['user'] = [
            'id_user' => $userId,
            'firstname' => $firstname,
            'lastname'=> $lastname,
            'email' => $lastname,
            'role'=> $role

        ];
    }

    function hasRole(string $role){
        if(!$this->isAuthenticated()){
            return false;
        }
        return $role == $_SESSION['user']['role'];
    }

 /**
  * est ce que l utilisateur est connecté?
  */
    function isAuthenticated(){
        return array_key_exists('user',$_SESSION) && isset($_SESSION['user']);

    }

 /**
  * deconnexionn
  */
    function logout(){

      //effacer les données de l'utilisateur enregistrés en session
      $_SESSION['user'] = null;

      //on detruit la session
      session_destroy();
    }
/* retourne l id de l'user connecté */
    function getUserId(){
        if(!$this->isAuthenticated()){
            return null;
        }
        return $_SESSION['user']['id_user'] ;
    
    }

    function getUserFullname(){
        if(!$this->isAuthenticated()){
            return null;
        }
        return $_SESSION['user']['firstname'] . ' '. $_SESSION['user']['lastname'];
    
    }

  function getUserEmail(){
    if(!$this->isAuthenticated()){
        return null;
    }
    return $_SESSION['user']['email'];
   
  }
}