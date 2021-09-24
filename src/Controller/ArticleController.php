<?php
namespace App\controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Framework\AbstractController;

class ArticleController extends AbstractController{

 /*action responsable de l'affichage de la page article*/
    public function index(){
         //Verification des paramétres

        //si le parametre n existe pas ou le parametre existe mais vide ou le paramétre existe et non pas un numéro
        //on affiche 404 et on sort du programme php
        if(!array_key_exists("article_id",$_GET) 
        || !isset($_GET["article_id"]) 
        || !ctype_digit($_GET["article_id"])
        ){
        http_response_code(404);
        echo'page not found';
        exit;
        }
        $articleId= intVal($_GET["article_id"]);
        $commenteModel = new CommentModel ();

        //si le formulaire d'ajout de commentaire est soumis
        if(!empty($_POST)){
        // on recupére les données pour les inserer dans la base
        $content= trim($_POST["content"]);

        // validation du formulaire: on verifie la coherence des données envoyés
        
        $errors=[]; //tabeau qui contient les messages d'erreurs
        if(!$content){
            $errors[]= 'Le champ comentaires est obligatoire';

        }
        if(empty($errors)){
            //requete sql
            $commenteModel->addComment([$content,$articleId, $this->userSession->getUserId()]);

            //REdirection HTTP pour repasser en GET pour perdre les données et  eviter des les reposter si refraichir la page
             header('Location: /article?article_id=' . $articleId);
            //header('Location: '. url('/article',['article_id=' => $articleId]));
            exit;
        }
        }

        //requete sql de selection de commentaires a afficher
        $comments = $commenteModel->getCommentsByArticleId($articleId);


        //Recupérer un article selon son id
        $articleModel = new ArticleModel ();
        $article = $articleModel->getArticleById($articleId);
        $template = 'article';
        require '../templates//base.phtml';



    }   

    public function filterArticleByCategory(){
     if(!array_key_exists("category_id",$_GET) 
        || !isset($_GET["category_id"]) 
        || !ctype_digit($_GET["category_id"])
     ){
        throw new \App\Exception\NotFoundException();
     }
            $categoryId= intVal($_GET["category_id"]);
            $articleModel = new ArticleModel ();
            $articles = $articleModel->getAllArticles($categoryId);
            //dump($articles);

            $template = 'category';
            require ('../templates/base.phtml');
    }
}
