<?php

namespace App\src\controller;

use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;

abstract class Controller extends TwigController
{
    protected $twig;
    protected $commentDAO;
    protected $postDAO;
    
    public function __construct()
    {
        $this->twig = parent::twigLoader();
        $this->postDAO = new postDAO();
        $this->commentDAO = new CommentDAO();
    }
}