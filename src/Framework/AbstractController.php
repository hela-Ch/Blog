<?php
 namespace App\Framework;
 use App\Service\Renderer\PHPRenderer;
 

 abstract class AbstractController {
     protected $flashbag;
     protected $userSession;

    public function __construct($renderer){
        $this->flashbag = new FlashBag();
        $this->userSession = new UserSession();
        $this->renderer = $renderer;


    }
    public function addFlash(string $message){
       $this->flashbag->addFlash($message);
    }
    public function render(string $template,array $data =[],string $base ='base'){
       return  $this->renderer->render($template,$data,$base );
     }
    
     
 }