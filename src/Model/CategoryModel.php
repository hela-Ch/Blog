<?php

namespace App\Model;
use App\Framework\AbstractModel;
use App\Model\ArticleModel;

class CategoryModel extends AbstractModel{


     public function getAllUsedCategories(){
          $sql = 'SELECT C.*
                    FROM category AS C
                    INNER JOIN article AS A ON A.category_id = C.id_category
                    GROUP BY C.id_category
                    ORDER BY label';
        $categories = $this->database->SelectAll($sql);
        return $categories;
     }

     public function getArticlesByCategory($categoryId){
          $sql = 'SELECT * FROM article
                   WHERE category_id = ?';

      $articles= $this->database->SelectAll($sql,[$categoryId]); 
      return $articles;       
                    
     }
     public function getAllCategories(){

          $sql = 'SELECT C.*
          FROM category AS C
          ORDER BY label';
       $categories = $this->database->SelectAll($sql);
       return $categories;
     }
   
}