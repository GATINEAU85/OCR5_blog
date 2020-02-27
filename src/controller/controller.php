<?php

require('src/model/model.php');
require_once('src/model/PostManager.php');
require('src/model/CommentManager.php');

//---------- Redirection vers la page d acceuil ----------
function home()
{
    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__.'/tmp'
    ]);

    echo $twig->render('index.html.twig');
}


//---------- Redirection vers la page de liste des posts ----------
function listPosts()
{
    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__.'/tmp'
    ]);
    $posts = new PostManager;
    $posts = $posts->getPosts();
    
    echo $twig->render('list_post.html.twig', [
        'posts' => $posts,
    ]);
}

//---------- Redirection vers la page d'un post en particulier ----------
function post()
{
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__.'/tmp'
    ]);
//    $post = getPost($_GET['id']);
//    $comments = getComments($_GET['id']);

    echo $twig->render('post.html.twig');
}

//---------- Redirection vers la page de contact ----------
function contact()
{
    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__.'/tmp'
    ]);

    echo $twig->render('contact.html.twig');
}


//---------- Redirection vers la page de contact ----------
function about()
{
    require 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__.'/tmp'
    ]);

    echo $twig->render('about.html.twig');
}
