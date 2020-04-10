<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller 
{
    private function checkLoggedIn()
    {
        if(!$this->twig->session->get('pseudo')) {
            $this->twig->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            return $this->twig->render('login.html.twig', [
                'key' => 'need_login', 
                'status' => 'danger'
            ]);
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if(!( $this->twig->session->get('role') === 'administrator')) {
            $this->twig->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            return $this->twig->render('index.html.twig', [
                'key' => 'not_admin', 
                'status' => 'danger'
            ]);
        } else {
            return true;
        }
    }
    
    public function addPost(Parameter $post)
    {
        if($this->checkAdmin()) {
            if($post->get('postTitre')) {
                $errors = $this->validation->validate($post, 'Post');
                if(!$errors) {
                    $this->postDAO->addPost($post, $this->twig->session->get('id'));
                    $this->twig->session->set('addPost', 'Le nouveau post a bien été ajouté');
                    $post = $this->postDAO->getPosts();
                    return $this->twig->render('list_post.html.twig', [
                        'posts' => $post,
                        'key' => 'addPost', 
                        'status' => 'success'
                    ]);
                }
                else{
                    $this->twig->session->set('addPost', $errors);
                    return $this->twig->render('create_post.html.twig', [
                        'post' => $post,
                        'key' => 'addPost', 
                        'status' => 'danger'
                    ]);
                }
            }
            else{
                return $this->twig->render('create_post.html.twig', [
                    'post' => $post,
                ]);
            }
        }
    }
    
    public function updatePost(Parameter $post, $postId)
    {
        $article = $this->postDAO->getPost($postId);
        
        if($this->checkAdmin()) {
            if($post->get('postTitre')) {
                $errors = $this->validation->validate($post, 'Post');
                if(!$errors){
                    $this->postDAO->updatePost($post,$postId, $this->twig->session->get('id'));
                    $this->twig->session->set('updatePost', 'Le post a bien été modifié');
                    $post = $this->postDAO->getPosts();
                    return $this->twig->render('list_post.html.twig', [
                        'posts' => $post,
                        'key' => 'updatePost', 
                        'status' => 'success'
                    ]);
                }else{
                    $this->twig->session->set('updatePost', $errors);
                    return $this->twig->render('create_post.html.twig', [
                        'post' => $article,
                        'key' => 'updatePost', 
                        'status' => 'danger'
                    ]);
                }
            }
            else{
                return $this->twig->render('create_post.html.twig', [
                    'post' => $article,
                ]);
            }
        }
    }
    
    public function deletePost()
    {
        if($this->checkAdmin()) {
            $this->postDAO->deletePost($this->get->get('id'));
            $this->twig->session->set('deletePost', 'Le post a bien été supprimé');

            $posts = $this->postDAO->getPosts();
            return $this->twig->render('list_post.html.twig', [
                'posts'     => $posts,
                'status'   => "success",
                'key'      => "deletePost",
            ]);    
        }
    }
            
    public function validateComment()
    {
        if($this->checkAdmin()) {
            $comment = $this->commentDAO->getComment($this->get->get('id'));
            $commentPostId = $comment->getPostId();

            $this->commentDAO->validateComment($this->get->get('id'));
            $this->twig->session->set('validateComment', 'Le commentaire a bien été validé');

            $post = $this->postDAO->getPost($commentPostId);
            $comments = $this->commentDAO->getComments($commentPostId);
            return $this->twig->render('post.html.twig', [
                'post'     => $post,
                'comments' => $comments,
                'status'   => "success",
                'key'      => "validateComment",
            ]);
        }
    }
        
    public function deleteComment()
    {
        if($this->checkLoggedIn()) {
            $comment = $this->commentDAO->getComment($this->get->get('id'));
            $commentPostId = $comment->getPostId();

            $this->commentDAO->deleteComment($this->get->get('id'));
            $this->twig->session->set('deleteComment', 'Le commentaire a bien été supprimé');

            $post = $this->postDAO->getPost($commentPostId);
            $comments = $this->commentDAO->getComments($commentPostId);
            return $this->twig->render('post.html.twig', [
                'post'     => $post,
                'comments' => $comments,
                'status'   => "success",
                'key'      => "deleteComment",
            ]);
        }
    }
    
    public function profile()
    {
        if($this->checkLoggedIn()) {
            $userId = $this->twig->session->get('id');
            $user = $this->userDAO->getUser($userId);

            return $this->twig->render('profile.html.twig',[
                "user" => $user,
            ]);
        }
    }
    
      
    public function updatePassword(Parameter $post)
    {
        if($this->checkLoggedIn()) {
            if($post->get('secondPassword') !== null && $post->get('firstPassword') === $post->get('secondPassword')) {
                $errors = $this->validation->validate($post, 'User');
                if(!$errors) {
                    $this->userDAO->updatePassword($post, $this->twig->session->get('id'));
                    $this->twig->session->set('updatePassword', "La mise à jour du mot de passe est effective.");
                    return $this->twig->render('index.html.twig', [
                        'key' => "updatePassword",
                        'status' => 'success'
                    ]);
                }else{
                    $this->twig->session->set('updatePost', $errors);
                    return $this->twig->render('index.html.twig', [
                        'key' => 'updatePost', 
                        'status' => 'danger'
                    ]);
                }
            }
            else{
                return $this->twig->render('updatePassword.html.twig',[
                    'id' => $this->twig->session->get('id'),
                ]);
            }
        }
    }
    
            
    public function logout()
    {
        if($this->checkLoggedIn()) {
            $this->twig->session->stop();
            $this->twig->session->start();
            $this->twig->session->set('logout', 'A bientôt');
            return $this->twig->render('index.html.twig', [
                'status'   => "success",
                'key'      => "logout",
            ]);
        }
    }
    
    public function updateAccount(Parameter $post)
    {
        if($this->checkLoggedIn()) {
            $this->userDAO->updateAccount($post, $this->twig->session->get('id'));
            $this->twig->session->set('updateAccount', 'Votre compte a bien été mis à jour');
            return $this->twig->render('index.html.twig', [
                'status'   => "success",
                'key'      => "updateAccount",
            ]);
        }
    }
    
    public function deleteAccount()
    {
        if($this->checkLoggedIn()) {
            $this->userDAO->deleteAccount($this->twig->session->get('id'));
            $this->twig->session->stop();
            $this->twig->session->start();
            $this->twig->session->set('deleteAccount', 'Votre compte a bien été supprimé');
            return $this->twig->render('index.html.twig', [
                'status'   => "success",
                'key'      => "deleteAccount",
            ]);
        }
    }
    
    public function administration()
    {
        if($this->checkAdmin()) {
            $posts = $this->postDAO->getPosts();
            $comments = $this->commentDAO->getAllComments();
            return $this->twig->render('administration.html.twig', [
                'posts' => $posts,
                'comments' => $comments
            ]);
        }
    }
}