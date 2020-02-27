<?php

require_once("Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
//        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');
        $req = $db->query('SELECT post.id, post.title, post.chapo, post.content, user.pseudo, post.date FROM post, user WHERE user.id = post.user_id ORDER BY date DESC LIMIT 0, 5');
        $posts = $req->fetchall();

        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post.id, post.title, post.chapo, post.content, user.pseudo, post.date FROM post, user WHERE user.id = post.user_id AND post.id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        
        return $post;
    }
}