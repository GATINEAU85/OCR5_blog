<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=projet5blog;charset=utf8', 'root', '');
        return $db;
    }
}