<?php

namespace App\Framework;
use Exception;
use PDO;

class Database {
    private $pdo;

   public function __construct(){
       $this->pdo = $this->getPDOConnection();

   }

    /*
Creation de la cnx a la BDD
*/

function getPDOConnection(){
    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8';
    $user = DB_USER;
    $password = DB_PASSWORD;
    $options = [
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
    ];
    
    
    try{
    $bdd = new PDO($dsn, $user, $password,$options);
    }catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
    return $bdd;

}
/* 
Preparation et execution d une requete sql
*/
function executeQuery(String $sql,array $values=[]){
    
    $req=$this->pdo->prepare($sql);
    $req->execute($values);
    return $req;


}

/*
execution d une requete de selection
et recuperation de tous les resultats
*/
function SelectAll(String $sql,array $values=[]){
    $response = $this->executeQuery($sql,$values);

    $results = $response->fetchAll();
    return $results;

}

/*
execution d une requete de selection
et recuperation d un seul resultat
*/
function selectOne(String $sql,array $values=[]){
    $response = $this->executeQuery($sql,$values);

    $result = $response->fetch();
    return $result;

}


}