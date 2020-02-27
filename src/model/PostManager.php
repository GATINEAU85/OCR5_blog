<?php

require_once("Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
//        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');
        $req = $db->query('SELECT id, title,chapo, content, author, date FROM post ORDER BY date DESC LIMIT 0, 5');
        $posts = $req->fetchall();

        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, date AS creation_date_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}