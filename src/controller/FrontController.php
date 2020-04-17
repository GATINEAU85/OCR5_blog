<?php

namespace App\src\controller;
use App\config\Parameter;

class FrontController extends Controller 
{
    public function home()
    {
        echo $this->twig->render('index.html.twig');
    }
    public function listPosts()
    {
        $posts = $this->postDAO->getPosts();

        echo $this->twig->render('list_post.html.twig', [
            'posts' => $posts,
        ]);
    }
    public function post()
    {
        $post = $this->postDAO->getPost($_GET['id']);

        $comments = $this->commentDAO->getComments($_GET['id']);

        echo $this->twig->render('post.html.twig', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
    
    public function addComment(Parameter $post, $id, $userId)
    {
        if($post->get('commentTitre')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $this->commentDAO->addComment($post, $id, $userId);
                $this->session->set('addComment', 'Le nouveau commentaire a bien été ajouté');
                $post = $this->postDAO->getPost($id);
                $comments = $this->commentDAO->getComments($id);
                echo $this->twig->render('post.html.twig', [
                    'comments' => $comments,
                    'post' => $post,
                    'status' => "success",
                    'key' => 'addComment'
                ]);
            }
            else{
                $this->session->set('addComment', $errors);
                $post = $this->postDAO->getPost($id);
                $comments = $this->commentDAO->getComments($id);
                echo $this->twig->render('post.html.twig', [
                    'post'     => $post,
                    'comments' => $comments,
                    'status'   => "danger",
                    'key'      => "addComment", 
                ]);
            }
        }
    }
    
    public function contact()
    {
        echo $this->twig->render('contact.html.twig');
    }
    public function about()
    {
        echo $this->twig->render('about.html.twig');
    }    
    public function login(Parameter $post)
    {
        if($post->get('logPseudo')) {
            $result = $this->userDAO->login($post);
//            var_dump($result);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Ravi de vous revoir parmis nous !');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('logPseudo'));
                echo $this->twig->render('index.html.twig', [
                    'post' => $post,
                    'status' => 'success',
                    'key'  => "login"
                ]);  
            }
            else{
                $this->session->set('error_login', "L'identification est incorrecte, réessayez");
                echo $this->twig->render('login.html.twig', [
                    'post' => $post,
                    'status' => 'danger',
                    'key'  => "error_login"
                ]);
            }
        }else{
            echo $this->twig->render('login.html.twig');
        }
    }
    public function createAccount(Parameter $post)
    {
        if($post->get('userName')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkUser($post)) {
                $errors['userPseudo'] = $this->userDAO->checkUser($post);
            }
            if(!$errors) {
                $this->userDAO->createUser($post);
                $this->session->set('createUser', 'Votre inscription a bien été effectuée');
                echo $this->twig->render('index.html.twig', [
                    'post' => $post,
                    'key' => 'createUser',
                    'status' => 'success'
                ]);
            }
            echo $this->twig->render('create_account.html.twig', [
                'post' => $post,
                'errors' => $errors,
            ]);
        }else{
            echo $this->twig->render('create_account.html.twig');
        }
    }
    
    public function contactMe(Parameter $post)
    {
        if ($post->get('envoiName') && $post->get('envoiMail') && $post->get('envoiMessage')){
            $provenanceName = $post->get('envoiName');
            $provenanceMail = $post->get('envoiMail');
            $message = $post->get('envoiMessage');
            mail('adgat34@gmail.com', 'Blog contact from :' . $provenanceName . '(' . $provenanceMail . ')' , $message);
        }else{
            $this->session->set('error_contact', "Problème d'envoi de mail : une information est manquante");
            echo $this->twig->render('create_account.html.twig', [
                'status' => "error",
                'key'    => "error_contact"
            ]);
        }
    }
}