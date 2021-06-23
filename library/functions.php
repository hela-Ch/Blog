<?php

/*
Creation de la cnx a la BDD
*/

function getPDOConnection(){
    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8';
    $user = DB_USER;
    $password = DB_PASSWORD;
    $options = [
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
    ];
    
    
    try{
    $bdd = new PDO($dsn, $user, $password,$options);
    }catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
    return $bdd;

}
/* 
Preparation et execution d une requete sql
*/
function executeQuery(String $sql,array $values=[]){
    $bdd = getPDOConnection();
    $req=$bdd->prepare( $sql);
    $req->execute($values);
    return $req;


}

/*
execution d une requete de selection
et recuperation de tous les resultats
*/
function SelectAll(String $sql,array $values=[]){
    $response = executeQuery($sql,$values);

    $results = $response->fetchAll();
    return $results;

}

/*
execution d une requete de selection
et recuperation d un seul resultat
*/
function selectOne(String $sql,array $values=[]){
    $response = executeQuery($sql,$values);

    $result = $response->fetch();
    return $result;

}

/**
 * Selectionne tous les articles par date de création decroissante
 */
function getAllArticles(){
    $sql='SELECT * 
          FROM article AS A
          INNER JOIN category AS C
          ON A.category_id = C.id_category
          ORDER BY A.created_at DESC';
    $datas = SelectAll($sql);
    return $datas;
}

/**
 * Inserer un commentaire dans la BDD
 */
function addComment(array $values){
    $sql= 'INSERT INTO comment(content,created_at,article_id,user_id) 
           VALUES(?, NOW() ,?, ?)';
           executeQuery($sql,$values);
}

/**
 * Recuperer les comm associé a un article à partir de l'identifiant
 */
function getCommentsByArticleId(int $articleId){
  $sql = 'SELECT *  
          FROM comment AS C
          INNER JOIN user AS U 
          ON C.user_id = U.id_user
          WHERE article_id=? 
          ORDER BY C.created_at DESC';

$comments = SelectAll($sql,[$articleId]);
return $comments;

}

/**
 * recuperer un article a partir de son identifiant
 */
function getArticleById(int $articleId){
    $sql = 'SELECT *  
    FROM article AS A
    INNER JOIN category AS C
    ON A.category_id = C.id_category
    WHERE id_article=?';
    
    //Recupérer des données dans la BDD selon le paramétre
    $article = selectOne($sql,[$articleId]); 
    return $article;

}

/**
 * creer un user
 */
function createUser(string $firstname,string $lastname,string $email,string $hash){
  $sql = 'INSERT INTO user 
         (firstname,lastname,email,password,created_at)
         VALUES (?, ? , ? , ?,NOW())';
   executeQuery($sql,[$firstname,$lastname,$email,$hash]) ;     

}
/**
 * recuperer un utilisateur par son email
 */
function getUserByEmail (string $email){
    $sql = 'SELECT * FROM user WHERE email = ?';
   return selectOne($sql,[$email]);
    
}

/**
 * verification email et password de l user au login
 */
function checkCredentials(string $email,string $password){
    $user=getUserByEmail ($email);
        //if(password_verify($password,$user['password'])){
           // return true;
       // }    
    return $user && password_verify($password,$user['password'])? $user : false;
}

/**
 * Gestion de la session utilisateur
 */
    //demarre une session si aucune n'est démarrée
    function checkSession(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        } 
    }
 function register(int $userId,string $firstname,string $lastname,string $email)
 {
    checkSession();
    $_SESSION['user'] = [
        'id_user' => $userId,
        'firstname' => $firstname,
        'lastname'=> $lastname,
        'email' => $lastname

    ];
 }

 /**
  * est ce que l utilisateur est connecté?
  */
 function isAuthenticated(){
    checkSession();
    return array_key_exists('user',$_SESSION) && isset($_SESSION['user']);

 }

 /**
  * deconnexionn
  */
  function logout(){
      checkSession();

      //effacer les données de l'utilisateur enregistrés en session
      $_SESSION['user'] = null;

      //on detruit la session
      session_destroy();
  }
/* retourne l id de l'user connecté */
function getUserId(){
    if(!isAuthenticated()){
        return null;
    }
    return $_SESSION['user']['id_user'] ;
   
  }
  function getUserFullname(){
    if(!isAuthenticated()){
        return null;
    }
    return $_SESSION['user']['firstname'] . ' '. $_SESSION['user']['lastname'];
   
  }

  function getUserEmail(){
    if(!isAuthenticated()){
        return null;
    }
    return $_SESSION['user']['email'];
   
  }

  /**
   * Gestion des messages flash (lors signup,login,logout)
   */

function initFlash(){
    checkSession();
      if(!array_key_exists('flash', $_SESSION)){
        $_SESSION['flash'] = [];
      }
}

function addFlash(string $message){
      initFlash();
      $_SESSION['flash'][] = $message;
}

/**
 * est ce qu'il ya des messages flash en session
 */
function hasFlash(){
    initFlash();
    return !empty($_SESSION['flash']);
}
/**
 * recuperer les messages,les retourner et les supprimer
 */
function getFlash(){
    initFlash();

    //recuperer les messages
    $messages = $_SESSION['flash'];

    //supprimer les messages de la session
    $_SESSION['flash']=[];

    //retourner les messages
    return $messages;

}
 
/**
 * construire une url absolue (http://mon-site.com/ma-page)à partir 
 * d'une route et d'un tableau des parametres
 */
function url(string $path,array $params=[]){
    $url = SITE_BASE_URL . $path ; //ex: http://localhost:8000/article
   if(!empty($params)) {
       $url .= '?'.http_build_query($params);

   }
   return $url;

}

/**
 * construire l url absolu d'une ressource (css,js,images ..;)
 */
function asset(string $path){
    return SITE_BASE_URL .'/' . $path;
}