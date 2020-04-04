<?php
namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Comment;

require_once("DAO.php");

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setTitle($row['title']);
        $comment->setComment($row['comment']);
        $comment->setDate($row['date']);
        $comment->setUser($row['pseudo']);
        $comment->setPostId($row['post_id']);
        return $comment;
    }
        
    public function getComment($commentId)
    {
        $query = 'SELECT comment.id, comment.title, comment.date, comment.comment, user.pseudo, comment.post_id FROM comment, user WHERE comment.user_id = user.id AND comment.id = ?';
        $result = $this->createQuery($query, [$commentId]);       
        $comment = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($comment);
    }
    
    public function getComments($postId)
    {
        $query = 'SELECT comment.id, comment.title, comment.date, comment.comment, user.pseudo, comment.post_id FROM comment, user WHERE comment.user_id = user.id AND comment.post_id = ? ORDER BY comment.date DESC';
        $result = $this->createQuery($query, [$postId]);       
        
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function addComment(Parameter $post, $postId, $userId)
    {             
        $query = 'INSERT INTO comment(title, comment, date, post_id, user_id) VALUES(?, ?, NOW(), ?, ?)';
        $this->createQuery($query, [$post->get('commentTitre'), $post->get('commentContenu'), $postId, $userId]);
    }
    
    public function deleteComment($commentId)
    {
        $query = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($query, [$commentId]);
    }
    
    public function getAllComments()
    {
        $query = 'SELECT comment.id, comment.title, comment.date, comment.comment, user.pseudo, comment.post_id FROM comment, user WHERE comment.user_id = user.id ORDER BY comment.date DESC';
        $result = $this->createQuery($query);
        $comments = [];
        foreach ($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
}