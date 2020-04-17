<?php
namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Post;

class PostDAO extends DAO
{
    private function buildObject($row)
    {
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitle($row['title']);
        $post->setChapo($row['chapo']);
        $post->setContent($row['content']);
        $post->setDate($row['date']);
        $post->setUser($row['pseudo']);
        return $post;
    }
    public function getPosts()
    {
        $query = 'SELECT post.id, post.title, post.chapo, post.content, post.user_id, user.pseudo, post.date FROM post, user WHERE user.id = post.user_id ORDER BY date DESC LIMIT 0, 5';
        $result = $this->createQuery($query);
        $posts = [];
        foreach ($result as $row){
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $posts;
    }

    public function getPost($postId)
    {
        $query = 'SELECT post.id, post.title, post.chapo, post.content,  post.user_id, user.pseudo, post.date FROM post, user WHERE user.id = post.user_id AND post.id = ?';
        $result = $this->createQuery($query, [$postId]);
        $post = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($post);
    }
    
    public function addPost(Parameter $post, $userId)
    {
        $query = 'INSERT INTO post (title, chapo, content, date, user_id) VALUES(?,?,?, NOW(), ?)';
        $this->createQuery($query,[$post->get('postTitre'), $post->get('postChapo'), $post->get('postContenu'), $userId]);
    }
        
    public function updatePost(Parameter $post, $postId, $userId)
    {
        $query = 'UPDATE post SET title=:title, chapo=:chapo, content=:content, date=NOW(), user_id=:userId WHERE id=:postId';
        $this->createQuery($query,[
            'title' => $post->get('postTitre'), 
            'chapo' => $post->get('postChapo'), 
            'content' => $post->get('postContenu'),
            'userId' => $userId,
            'postId' => $postId,
        ]);
    }
            
    public function deletePost($postId)
    {
        $query = 'DELETE FROM comment WHERE post_id = ?';
        $this->createQuery($query, [$postId]);
        $query = 'DELETE FROM post WHERE id = ?';
        $this->createQuery($query,[$postId]);
    }
}