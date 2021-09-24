<?php


use App\Model\UserModel;

  /**
 * verification email et password de l user au login
 */
function checkCredentials(string $email,string $password){
    $userModel = new UserModel ();
    $user=$userModel ->getUserByEmail ($email);
         
    return $user && password_verify($password,$user['password'])? $user : false;
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


/**
 * verify if user is already subscripted to newsletter
 */
function verifyUserisAlreadySubscripted(string $email){
    $sql ='SELECT * 
           FROM newsletter 
           WHERE user_email =?
           ';
    $database = new Database() ;        
    return $database->selectOne($sql,[$email]);
         

}
/**
 * add an email to the newsletter base
 */

function addUserToNewsletter(string $email){
    $sql = 'INSERT INTO newsletter 
            (user_email,created_at)
             VALUES (?, NOW())';
    $database = new Database() ; 
    $database->executeQuery($sql,[$email]);        

}


//pour modifier le nom des uploadedfichiers 
function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}