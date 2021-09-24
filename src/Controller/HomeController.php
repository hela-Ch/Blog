<?php
namespace App\controller;
use App\Model\ArticleModel;
//use App\Service\Renderer\PHPRenderer;
use App\Framework\AbstractController;

class HomeController extends AbstractController{

/* methode responsable de l'affichage de la page d'accueil*/
    public function index(){
        $articleModel = new ArticleModel();
        $articles= $articleModel->getAllArticles();
               
        return $this->render('home', [
            'articles'=> $articles
        ]);
        
    }
    
}