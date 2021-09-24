<?php

return [
    '/' => [
        'controller'=>'HomeController',
        'method'=> 'index'
    ],
    '/article' =>  [
        'controller'=>'ArticleController',
        'method'=> 'index'
    ],
    '/signup' =>  [
        'controller'=>'AccountController',
        'method'=> 'signup'
    ],
     '/login' =>  [
        'controller'=>'AuthController',
        'method'=> 'login'
    ],
     '/logout' =>  [
        'controller'=>'AuthController',
        'method'=> 'logout'
    ],
    '/category' =>  [
        'controller'=>'ArticleController',
        'method'=> 'filterArticleByCategory'
    ],

     '/contact' =>  [
        'controller'=>'ContactController',
        'method'=> 'index'
    ],
    '/admin' =>  [
        'controller'=>'Admin\AdminController',
        'method'=> 'index'
    ],
    '/admin/article/new' =>  [
        'controller'=>'Admin\AdminArticleController',
        'method'=> 'new'
    ],
    '/admin/article/edit' =>  [
        'controller'=>'Admin\AdminArticleController',
        'method'=> 'edit'
    ],
    '/admin/article/delete' =>  [
        'controller'=>'Admin\AdminArticleController',
        'method'=> 'delete'
    ],

    '/subscription' =>  [
        'controller'=>"require '../controller/subscription.php",
        
    ]
];