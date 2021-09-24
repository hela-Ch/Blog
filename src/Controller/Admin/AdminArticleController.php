<?php

namespace App\Controller\Admin;

use App\Framework\AbstractController;
use App\Exception\NotFoundException;
use App\Exception\AccessNotAllowedException;
use App\Model\ArticleModel;
use App\Model\CategoryModel;

class AdminArticleController extends AbstractController {

    public function new()
    {
        if(!$this->userSession->hasRole('ROLE_ADMIN')){
            throw new AccessNotAllowedException();
        }
        $errors=[];
        if(!empty($_POST)){
            //recuperer les données du formulaire
            $title= trim($_POST['title']);
            $categoryId = intval($_POST['category']);
            $image = $_FILES['image'];
            $content= trim($_POST['content']);
            
          
           if(!$title){
               $errors[] = 'le champ titre est obligatoire';
           }
        
           if(!$categoryId){
            $errors[] = 'le champ categorie  est obligatoire';
           }

           if(!$content){
            $errors[]= 'Le champ contenu est obligatoire';
           }
        
        
           // Teser si le fichier a bien été envoyé et s'il n'y a pas d'erreur
           if(array_key_exists('image',$_FILES)  && $_FILES['image']['error'] === 0){

               //verification du type du fichier(est ce que c'est bien une image ?)
               $mimeType = mime_content_type($_FILES['image']['tmp_name']);
               $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
               
               if(!in_array($mimeType,$allowedMimeTypes)){
                   
                $errors[] = 'type de fichier non autorisé';

               }
                // Tester si le fichier n'est pas trop gros
                if ($_FILES['image']['size'] > 1000000){
                    $errors[]="taille del'image est trop grande";
                }
            }         
                  
          if(empty($errors)) {
              
              //initialisation du nom du fichier
              $filename = '';
              if(array_key_exists('image',$_FILES) && isset($_FILES['image']['name']) && ($_FILES['image']['error'] === 0)){

                  $extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                  $basename = pathinfo($_FILES['image']['name'],PATHINFO_FILENAME);
                  $basename = slugify($basename);
                  $filename = $basename . uniqid() .'.' . $extension;

                  //copie le fichier dans le dossier upload
                  move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$filename);
              }

                $articleModel = new ArticleModel();
                $req=$articleModel->insert($title ,$content ,$categoryId ,$filename);

                $this->addFlash('article ajouté !');

                header('Location: '. url('/admin'));
                exit;
          }
        }
          
        $categories=(new CategoryModel())->getAllCategories();
       
        return $this->render('/admin/article/new',[
            "categories"=> $categories,
            "errors"=> $errors,
            'title'=> $title ?? '',
            'content'=> $content ?? '',
            'categoryId'=> $categoryId ?? -1 ,
            'image'=> $image ?? ''
        ],'admin/base_admin');

    }

    public function edit(){
        if(!$this->userSession->hasRole('ROLE_ADMIN')){
            throw new AccessNotAllowedException();
        }
        if(!array_key_exists('article_id',$_GET)
           || !isset($_GET['article_id']) 
           || !ctype_digit($_GET['article_id'])){

              throw new NotFoundException();
        }
        $articleId=intval($_GET['article_id']);
        $articleModel = new ArticleModel();
        $article=$articleModel->getArticleById($articleId);
                
        $errors=[];
        if(!empty($_POST)){
            //recuperer les données du formulaire
            $title= trim($_POST['title']);
            $categoryId = intval($_POST['category']);
            $image = $_FILES['image'];
            $content= trim($_POST['content']);
          
           if(!$title){
               $errors[] = 'le champ titre est obligatoire';
           }
        
           if(!$categoryId){
            $errors[] = 'le champ categorie  est obligatoire';
           }

           if(!$content){
            $errors[]= 'Le champ contenu est obligatoire';
           }
        
        
           // Teser si le fichier a bien été envoyé et s'il n'y a pas d'erreur
           if(array_key_exists('image',$_FILES) && isset($_FILES['image']['name']) && $_FILES['image']['error'] === 0){

               //verification du type du fichier(est ce que c'est bien une image ?)
               $mimeType = mime_content_type($_FILES['image']['tmp_name']);
               $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];
               
               if(!in_array($mimeType,$allowedMimeTypes)){
                   
                $errors[] = 'type de fichier non autorisé';

               }
                // Tester si le fichier n'est pas trop gros
                if ($_FILES['image']['size'] > 1000000){
                    $errors[]="taille del'image est trop grande";
                }
            }         
                  
          if(empty($errors)) {
              
              //initialisation du nom du fichier
              $filename = $article['image'];
              if(array_key_exists('image',$_FILES) && isset($_FILES['image']['name']) && ($_FILES['image']['error'] === 0)){

                 //suppression de l'ancien image si on a une nouvelle image
                  if($article['image']){
                      unlink('upload/'.$article['image']);
                  }

                  $extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                  $basename = pathinfo($_FILES['image']['name'],PATHINFO_FILENAME);
                  $basename = slugify($basename);
                  $filename = $basename . uniqid() .'.' . $extension;

                  //copie le fichier dans le dossier upload
                  move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$filename);

                  //supprime
              }

               $articleModel = new ArticleModel();
               $req=$articleModel->update($title ,$content ,$categoryId ,$filename,$articleId);

               $this->addFlash('article modifié !');

               header('Location: '. url('/admin'));
               exit;
          } 

        }




                $categories=(new CategoryModel())->getAllCategories();
                   return $this->render('/admin/article/edit',[
                    "categories"=> $categories,
                    "errors"=> $errors ?? [],
                    'title'=> $title ?? htmlspecialchars($article['title']) ,
                    'content'=> $content ??htmlspecialchars($article['content']),
                    'categoryId'=> $categoryId??htmlspecialchars($article['category_id']),
                    'image'=> htmlspecialchars($article['image'])
                ],'admin/base_admin');

        
    }  
    
    public function delete(){
        if(!$this->userSession->hasRole('ROLE_ADMIN')){
            throw new AccessNotAllowedException();
        }
        //verification du parametre article_id de l'url
        if(!array_key_exists('article_id',$_GET)
        || !isset($_GET['article_id']) 
        || !ctype_digit($_GET['article_id'])){

           throw new NotFoundException();
        }
        
        $articleId = intval($_GET['article_id']);
        $articleModel = new ArticleModel();
        
        $article=$articleModel->getArticleById($articleId);
        
        //supprimer l'image associé a l'article
        if($article['image']){
            unlink('upload/'.$article['image']);
        }

        $articleModel->delete($articleId);
    
        $this->addFlash('article supprimé!');
        header('Location: '. url('/admin'));
        exit;
    }
}
