<?php
//if(!isset($_SESSION['id'])){header("location:index.php");}

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
        addComment([$content,$articleId, getUserId()]);

        //REdirection HTTP pour repasser en GET pour perdre les données et  eviter des les reposter si refraichir la page
       // header('Location: /article?article_id=' . $articleId);
        header('Location: '. url('/article',['article_id=' => $articleId]));
        exit;
    }
}

//requete sql de selection de commentaires a afficher
$comments = getCommentsByArticleId($articleId);


//Recupérer un article selon son id
$article = getArticleById($articleId);
$template = 'article';
require '/Users/hlihla/Desktop/WEBFORCE3/PHP/templates/base.phtml';

