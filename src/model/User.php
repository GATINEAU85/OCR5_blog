<?php
namespace App\src\model;

class User
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $name;
        
    /**
     * @var string
     */
    private $surname;
        
    /**
     * @var string
     */
    private $pseudo;
        
    /**
     * @var string
     */
    private $mail;
        
    /**
     * @var string
     */
    private $password;
        
    /**
     * @var int
     */
    private $roleId;
    
//Getters
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getName() 
    {
        return $this->name;
    }
          
    /**
     * @return string
     */  
    public function getSurname() 
    {
        return $this->surname;
    }
        
    /**
     * @return string
     */
    public function getPseudo() 
    {
        return $this->pseudo;
    }
        
    /**
     * @return string
     */
    public function getMail() 
    {
        return $this->mail;
    }
        
    /**
     * @return string
     */
    public function getPassword() 
    {
        return $this->password;
    }
        
    /**
     * @return int
     */
    public function getRoleId() 
    {
        return $this->roleId;
    }
    
    
//Setters
    /**
     * @param int $id
     */
    public function setId($id)
    {
      $this->id = (int) $id;
    } 
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
      $this->name = $name;
    }
    
    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
      $this->surname = $surname;
    }
    
    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
      $this->pseudo = $pseudo;
    }
    
    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
      $this->mail = $mail;
    }
    
    /**
     * @param string $password
     */
    public function setPwd($password)
    {
      $this->pwd = $password;
    }
      
    /**
     * @param string $roleId
     */  
    public function setRoleId($roleId)
    {
      $this->roleId = (int) $roleId;
    }
    
}