<?php

namespace App\Controller\Admin;

use App\Framework\AbstractController;
use App\Model\ArticleModel;
use App\Exception\AccessNotAllowedException;

class AdminController extends AbstractController {


    public function index()
    {   
        if(!$this->userSession->hasRole('ROLE_ADMIN')){
            throw new AccessNotAllowedException();
        }
        $articleModel = new ArticleModel();
        $articles= $articleModel->getAllArticles(); 
        return $this->render('/admin/admin', [
            'articles'=> $articles
        ],'admin/base_admin');
    }
}