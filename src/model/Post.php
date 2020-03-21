<?php

namespace App\src\model;

/**
 * @AnnotationSQLTable(table='post')
 */
class Post
{
//Attributs
    /**
     * @var int
     * @AnnotationSQLField(field='id')
     */
    private $id;
    
    /**
     * @var string
     * @AnnotationSQLField(field='title')
     */
    private $title;
    
    /**
     * @var string
     * @AnnotationSQLField(field='content')
     */
    private $content;
    
    /**
     * @var string
     * @AnnotationSQLField(field='chapo')
     */
    private $chapo;
    
    /**
     * @var \DateTime
     * @AnnotationSQLField(field='date')
     */
    private $date;
    
    /**
     * @var int
     * @AnnotationSQLField(field='user_id')
     */
    private $userId;
    
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
    public function getTitle() 
    {
        return $this->title;
    }
    
    /**
     * @return string
     */
    public function getContent() 
    {
        return $this->content;
    }
    
    /**
     * @return string
     */
    public function getChapo() 
    {
        return $this->chapo;
    }
    
    /**
     * @return \DateTime
     */
    public function getDate() 
    {
        return $this->date;
    }
    
    /**
     * @return int
     */
    public function getUserId() 
    {
        return $this->userId;
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
     * @param string $title
     */
    public function setTitle($title)
    {
      $this->title = $title;
    }
    
    /**
     * @param string $content
     */
    public function setContent($content)
    {
      $this->content = $content;
    }
    
    /**
     * @param string $chapo
     */
    public function setChapo($chapo)
    {
      $this->chapo = $chapo;
    }
    
    /**
     * @param \DateTime $date
     */
//    public function setDate(\DateTime $date)
    public function setDate($date)
    {
      $this->date = $date;
    }
    
    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
      $this->userId = (int) $userId;
    }
    
    
}