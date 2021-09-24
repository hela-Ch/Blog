<?php

namespace App\Framework;

abstract class AbstractSession {
    public function __construct(){
        $this->checkSession();
    }

    //demarre une session si aucune n'est démarrée
    function checkSession(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        } 
    }
}