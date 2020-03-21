<?php

class User extends Model
{
    private $id;
    private $name;
    private $surname;
    private $pseudo;
    private $mail;
    private $pwd;
    private $roleId;
    
    //Getters
    public function getId()
    {
        return $this->id;
    }
    
    public function getName() 
    {
        return $this->name;
    }
        
    public function getSurname() 
    {
        return $this->surname;
    }
    
    public function getPseudo() 
    {
        return $this->pseudo;
    }
    
    public function getMail() 
    {
        return $this->mail;
    }
    
    public function getPwd() 
    {
        return $this->pwd;
    }
    
    public function getRoleId() 
    {
        return $this->roleId;
    }
    
    
    //Setters
    public function setId($id)
    {
      $this->id = (int) $id;
    } 

    public function setName($name)
    {
      $this->name = $name;
    }
    
    public function setSurname($surname)
    {
      $this->surname = $surname;
    }
    
    public function setPseudo($pseudo)
    {
      $this->pseudo = $pseudo;
    }
    
    public function setMail($mail)
    {
      $this->mail = $mail;
    }
    
    public function setPwd($pwd)
    {
      $this->pwd = $pwd;
    }
        
    public function setRoleId($roleId)
    {
      $this->roleId = (int) $roleId;
    }
    
}