<?php

session_start(); //demarrage de la session pour pouvoir utiliser $_SESSION
require '../vendor/autoload.php';
/* 
 Le fichier index.php joue le role de front controller
 Toutes les requetes, toutes les pages du site passent par ce fichier
*/
//inclure de dependances
require '../app/config.php';
require '../library/functions.php';

$path = $_SERVER['PATH_INFO']? $_SERVER['PATH_INFO']:'/';
//dump($path);

switch($path){
    case '/':
        require '../controller/home.php';
    break;  
    case '/article':
        require '../controller/article.php';
    break; 
    case '/signup' :
        require '../controller/signup.php';
    break; 
    case '/login' :
        require '../controller/login.php';
    break; 
    case '/logout' :
        require '../controller/logout.php';
    break; 
    case '/subscription' :
        require '../controller/subscription.php';
    break;   
    default:
    http_response_code(404)  ;
    echo 'error 404 :page not found';
    exit;
}

?>