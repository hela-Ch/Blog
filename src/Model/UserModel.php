<?php

//definition de l'espace de nom dans lequel se trouve dans ce fichier

namespace App\Model;
use App\Framework\AbstractModel;
use App\Exception\UserAlreadyExistsException;

class UserModel extends AbstractModel{


    /**
 * creer un user
 */
function createUser(string $firstname,string $lastname,string $email,string $hash,string $role ='ROLE_USER'){
    if($this->getUserByEmail($email))
    {
        throw new UserAlreadyExistsException ('il existe déja un compte associé à cet email');
    }
    $sql = 'INSERT INTO user 
           (firstname,lastname,email,password,created_at,role)
           VALUES (?, ? , ? , ?,NOW(),?)';    
     $this->database->executeQuery($sql,[$firstname,$lastname,$email,$hash,$role]) ;     
  
  }
  /**
   * recuperer un utilisateur par son email
   */
  function getUserByEmail (string $email){
      $sql = 'SELECT * FROM user WHERE email = ?';
     return $this->database->selectOne($sql,[$email]);
      
  }
  
}