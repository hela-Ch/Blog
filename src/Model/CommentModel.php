<?php 

namespace App\Model;
use App\Framework\AbstractModel;

class CommentModel extends AbstractModel{


/**
 * Inserer un commentaire dans la BDD
 */
function addComment(array $values){
    $sql= 'INSERT INTO comment(content,created_at,article_id,user_id) 
           VALUES(?, NOW() ,?, ?)';
           
    $this->database->executeQuery($sql,$values);
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


$comments = $this->database->SelectAll($sql,[$articleId]);
return $comments;

}
}
