<?php

require_once("DbManager.php");

class UserManager extends DbManager
{
    public function getUsers()
    {
        $db = $this->dbConnect();
//        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');
        $req = $db->query('SELECT id, title, content, date FROM post ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, prenom, nom, mail FROM user WHERE id = ?');
        $req->execute(array($userId));
        $user = $req->fetch();

        return $user;
    }
}