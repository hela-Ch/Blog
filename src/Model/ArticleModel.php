<?php

namespace App\Model;
use App\Framework\AbstractModel;

class ArticleModel extends AbstractModel{
    
  

    /**
 * Selectionne tous les articles par date de création decroissante
 */
function getAllArticles(int $categoryId = 0){
    $values = [];

    $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C ON A.category_id = C.id_category';
            
    if ($categoryId) {
        $values[] = $categoryId;
        $sql .= ' WHERE A.category_id = ?';
    }

    $sql .= ' ORDER BY A.created_at DESC';
    $datas = $this->database->SelectAll($sql,$values);
    return $datas;
}

/**
 * recuperer un article a partir de son identifiant
 */
function getArticleById(int $articleId){
    $sql = 'SELECT *  
    FROM article AS A
    INNER JOIN category AS C
    ON A.category_id = C.id_category
    WHERE id_article = ?';
    
    //Recupérer des données dans la BDD selon le paramétre
    $article = $this->database->selectOne($sql,[$articleId]); 
    return $article;

}

  //ajouter un article dans la BDD selon les paramétres
function insert(string $title , string $content,int $category_id,string $image){
    $sql = 'INSERT INTO article(title,content,created_at,category_id,image)
            Values(?,?,NOW(),?,?)';
     $req=$this->database->executeQuery($sql,[$title,$content,$category_id,$image]); 
     return $req;    
    
}

function update(string $title , string $content,int $category_id,string $image,int $articleId){
     
    $sql = 'UPDATE article 
            SET
                title = ?,
                content = ?,
                category_id = ?,
                image = ?
            WHERE id_article  = ?' ;
             
    $this->database->executeQuery($sql,[$title,$content,$category_id,$image,$articleId]); 
    
}
function delete (int $articleId){
    $sql = 'DELETE FROM article WHERE id_article = ?';
    $this->database->executeQuery($sql,[$articleId]); 
    
}
}