<?php

namespace App\Framework;
/**
   * Gestion des messages flash (lors signup,login,logout)
   */

Class FlashBag extends AbstractSession{

  
    public function __construct()
    {
        parent::__construct();
        $this->initFlash();
    }
    

    function initFlash()
    {
          if(!array_key_exists('flash', $_SESSION)){
            $_SESSION['flash'] = [];
          }
    }
    
    function addFlash(string $message)
    {
         
          $_SESSION['flash'][] = $message;
    }
    
    /**
     * est ce qu'il ya des messages flash en session
     */
    function hasFlash()
    {
        
        return !empty($_SESSION['flash']);
    }

    /**
     * recuperer les messages,les retourner et les supprimer
     */
    function getFlash()
    {
    
        //recuperer les messages
        $messages = $_SESSION['flash'];
    
        //supprimer les messages de la session
        $_SESSION['flash']=[];
    
        //retourner les messages
        return $messages;
    
    }
}