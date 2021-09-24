<?php

namespace App\Service\Renderer;
use A\Framework\AbstractController;


class PHPRenderer implements RendererInterface {
    public function render(string $template,array $data= [],string $baseTemplate='base'){

       extract($data);
       
       //demarage temporisation de sortie
       ob_start();
       require ('../templates/'.$baseTemplate.'.phtml');
       return ob_get_clean();

    }
}