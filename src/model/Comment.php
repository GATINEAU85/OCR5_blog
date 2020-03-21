<?php

namespace App\src\model;

/**
 * @AnnotationSQLTable(table='comment')
 */
class Comment
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
     * @AnnotationSQLField(field='comment')
     */
    private $comment;
        
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
        
    /**
     * @var int
     * @AnnotationSQLField(field='post_id')
     */
    private $postId;
    
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
    public function getComment() 
    {
        return $this->comment;
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
        
    /**
     * @return int
     */
    public function getPostId() 
    {
        return $this->postId;
    }
    
    
//Setters
    /**
     * @param int $id
     */
    public function setId($id)
    {
      $this->news = (int) $id;
    } 
    
    /**
     * @param int $title
     */
    public function setTitle($title)
    {
      $this->title = $title;
    }   
    
    /**
     * @param int $comment
     */
    public function setComment($comment)
    {
      $this->comment = $comment;
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
            
    /**
     * @param int $postId
     */
    public function setPostId($postId)
    {
      $this->postId = (int) $postId;
    }
    
}