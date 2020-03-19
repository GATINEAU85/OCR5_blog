<?php

namespace App\src\controller;
use App\src\DAO\PostDAO;
use App\src\DAO\CommentDAO;

class FrontController extends TwigController 
{
    public function __construct()
    {
        $this->twig = parent::twigLoader();
        $this->articleDAO = new postDAO();
        $this->commentDAO = new CommentDAO();
    }
    public function home()
    {
        echo $this->twig->render('index.html.twig');
    }
    public function listPosts()
    {
        $posts = $this->articleDAO->getPosts();

        echo $this->twig->render('list_post.html.twig', [
            'posts' => $posts,
        ]);
    }
    public function post()
    {
        $post = $this->articleDAO->getPost($_GET['id']);
        $post = $post->fetch();

        $comments = $this->commentDAO->getComments($_GET['id']);

        echo $this->twig->render('post.html.twig', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
    public function contact()
    {
        echo $this->twig->render('contact.html.twig');
    }
    public function about()
    {
        echo $this->twig->render('about.html.twig');
    }    
    public function login()
    {
        echo $this->twig->render('login.html.twig');
    }
}