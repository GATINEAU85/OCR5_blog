<?php

namespace App\src\controller;

use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;
use App\config\Request;
use App\src\Constraint\Validation;

abstract class Controller extends TwigController
{
    protected $twig;
    protected $commentDAO;
    protected $postDAO;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;
    
    public function __construct()
    {
        $this->twig = parent::twigLoader();
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();
        
        $this->validation = new Validation();
        $this->request = new Request();
        
        $this->get =  $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}