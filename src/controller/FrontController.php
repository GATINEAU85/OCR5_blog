<?php

namespace App\src\controller;
use App\config\Parameter;

class FrontController extends Controller 
{
    public function home()
    {
        return $this->twig->render('index.html.twig');
    }
    public function listPosts()
    {
        $posts = $this->postDAO->getPosts();

        return $this->twig->render('list_post.html.twig', [
            'posts' => $posts,
        ]);
    }
    public function post()
    {
        $post = $this->postDAO->getPost($this->get->get('id'));

        $comments = $this->commentDAO->getComments($this->get->get('id'));

        return $this->twig->render('post.html.twig', [
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
                $this->twig->session->set('addComment', 'Le nouveau commentaire a bien été ajouté');
                $post = $this->postDAO->getPost($id);
                $comments = $this->commentDAO->getComments($id);
                return $this->twig->render('post.html.twig', [
                    'comments' => $comments,
                    'post' => $post,
                    'status' => "success",
                    'key' => 'addComment'
                ]);
            }else{
                $this->twig->session->set('addComment', $errors);
                $post = $this->postDAO->getPost($id);
                $comments = $this->commentDAO->getComments($id);
                return $this->twig->render('post.html.twig', [
                    'post'     => $post,
                    'comments' => $comments,
                    'status'   => "danger",
                    'key'      => "addComment", 
                ]);
            }
        }else{
            $this->twig->session->set('addComment', "Une erreur est présente dans la saisie.");
            $post = $this->postDAO->getPost($id);
            $comments = $this->commentDAO->getComments($id);
            return $this->twig->render('post.html.twig', [
                'post'     => $post,
                'comments' => $comments,
                'status'   => "danger",
                'key'      => "addComment", 
            ]);
        }
    }
    
    public function contact()
    {
        return $this->twig->render('contact.html.twig');
    }
    public function about()
    {
        return $this->twig->render('about.html.twig');
    }    
    public function login(Parameter $post)
    {
        if($post->get('logPseudo')) {
            $result = $this->userDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->twig->session->set('login', 'Ravi de vous revoir parmis nous !');
                $this->twig->session->set('id', $result['result']['id']);
                $this->twig->session->set('role', $result['result']['name']);
                $this->twig->session->set('pseudo', $post->get('logPseudo'));
                return $this->twig->render('index.html.twig', [
                    'post' => $post,
                    'status' => 'success',
                    'key'  => "login"
                ]);  
            }
            else{
                $this->twig->session->set('error_login', "L'identification est incorrecte, réessayez");
                return $this->twig->render('login.html.twig', [
                    'post' => $post,
                    'status' => 'danger',
                    'key'  => "error_login"
                ]);
            }
        }else{
            return $this->twig->render('login.html.twig');
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
                $this->twig->session->set('createUser', 'Votre inscription a bien été effectuée');
                return $this->twig->render('index.html.twig', [
                    'post' => $post,
                    'key' => 'createUser',
                    'status' => 'success'
                ]);
            }else{
                foreach($errors as $error){
                    $this->twig->session->set('createUser', $error);
                    return $this->twig->render('create_account.html.twig', [
                        'post' => $post,
                        'key' => 'createUser',
                        'status' => 'danger'
                    ]);
                }
            }
        }else{
            return $this->twig->render('create_account.html.twig');
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
            $this->twig->session->set('error_contact', "Problème d'envoi de mail : une information est manquante");
            return $this->twig->render('create_account.html.twig', [
                'status' => "error",
                'key'    => "error_contact"
            ]);
        }
    }
}