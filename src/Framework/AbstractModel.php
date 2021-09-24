<?php

namespace App\Framework;

class AbstractModel {
    protected $database;
    public function __construct(){
        $this->database = new Database();
    }

}