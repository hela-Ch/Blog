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

$path = $_SERVER['PATH_INFO']??'/';
//dump($path);


try{
    $renderer = new App\Service\Renderer\PHPRenderer();

    //routing
    $routes = require '../app/routes.php';

    if(!array_key_exists($path,$routes)){
       throw new \App\Exception\NotFoundException();
        
    }
    $action = $routes[$path];
    $controllerClassname = '\\App\\Controller\\'.$action['controller'];
    $method = $action['method'];

    $controller = new $controllerClassname($renderer);
    echo $controller->$method();
}
catch (\App\Exception\NotFoundException $exception){
    http_response_code(404);
    echo'page not found';
    exit;
}
catch (\App\Exception\AccessNotAllowedException $exception){
    http_response_code(403);
    echo'Erreur 403 : Accés non autorisé';
    exit;
}
catch (PDOException $exception){
    echo 'probleme avec la bdd ' . $exception->getMessage();
}  
catch(Exception $exception){
    echo '[Erreur] : ' .$exception->getMessage();
} 

?>