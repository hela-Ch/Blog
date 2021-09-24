<?php

namespace App\Controller;
use App\Model\CategoryModel ;

class CategoryController {
    private $categories;
    
   public function index(){
    if(!array_key_exists("category_id",$_GET) 
    || !isset($_GET["category_id"]) 
    || !ctype_digit($_GET["category_id"])
    ){
    http_response_code(404);
    echo'page not found';
    exit;
    }
    $categoryId= intVal($_GET["category_id"]);
    $categoryModel = new CategoryModel();
    $datas = $categoryModel ->getArticlesByCategory($categoryId);

       $template = 'home';
       require ('../templates/base.phtml');
   }
  }
