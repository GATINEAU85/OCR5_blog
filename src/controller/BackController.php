<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller 
{
    public function addPost(Parameter $post)
    {
        if($post->get('postTitre')) {
            $errors = $this->validation->validate($post, 'Post');
            if(!$errors) {
                $this->postDAO->addPost($post, $this->session->get('id'));
                $this->session->set('addPost', 'Le nouveau post a bien été ajouté');
                $post = $this->postDAO->getPosts();
                echo $this->twig->render('list_post.html.twig', [
                    'posts' => $post,
                    'key' => 'addPost', 
                    'status' => 'success'
                ]);
            }
            else{
                $this->session->set('addPost', $errors);
                echo $this->twig->render('create_post.html.twig', [
                    'post' => $post,
                    'key' => 'addPost', 
                    'status' => 'danger'
                ]);
            }
        }
        else{
            echo $this->twig->render('create_post.html.twig', [
                'post' => $post,
            ]);
        }
    }
    
    public function updatePost(Parameter $post, $postId)
    {
        $article = $this->postDAO->getPost($postId);
        
        if($post->get('postTitre')) {
            $errors = $this->validation->validate($post, 'Post');
            if(!$errors){
                $this->postDAO->updatePost($post,$postId, $this->session->get('id'));
                $this->session->set('updatePost', 'Le post a bien été modifié');
                $post = $this->postDAO->getPosts();
                echo $this->twig->render('list_post.html.twig', [
                    'posts' => $post,
                    'key' => 'updatePost', 
                    'status' => 'success'
                ]);
            }else{
                $this->session->set('updatePost', $errors);
                echo $this->twig->render('create_post.html.twig', [
                    'post' => $article,
                    'key' => 'updatePost', 
                    'status' => 'danger'
                ]);
            }
        }
        else{
            echo $this->twig->render('create_post.html.twig', [
                'post' => $article,
            ]);
        }
    }
    
    public function deletePost($postId)
    {
        $this->postDAO->deletePost($postId);
        $this->session->set('deletePost', 'Le post a bien été supprimé');
        
        $posts = $this->postDAO->getPosts();
        echo $this->twig->render('list_post.html.twig', [
            'posts'     => $posts,
            'status'   => "success",
            'key'      => "deletePost",
        ]);    
    }
        
    public function deleteComment($postId, $commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('deleteComment', 'Le commentaire a bien été supprimé');
        
        $post = $this->postDAO->getPost($postId);
        $comments = $this->commentDAO->getComments($postId);
        echo $this->twig->render('post.html.twig', [
            'post'     => $post,
            'comments' => $comments,
            'status'   => "success",
            'key'      => "deleteComment",
        ]);
    }
    
    public function profile()
    {
        $userId = $this->session->get('id');
        $user = $this->userDAO->getUser($userId);

        echo $this->twig->render('profile.html.twig',[
            "user" => $user,
        ]);
    }
    
      
    public function updatePassword(Parameter $post)
    {
        if($post->get('secondPassword') !== null && $post->get('firstPassword') === $post->get('secondPassword')) {
            $errors = $this->validation->validate($post, 'User');
            if(!$errors) {
                $this->userDAO->updatePassword($post, $this->session->get('id'));
                $this->session->set('updatePassword', "La mise à jour du mot de passe est effective.");
                echo $this->twig->render('index.html.twig', [
                    'key' => "updatePassword",
                    'status' => 'success'
                ]);
            }else{
                $this->session->set('updatePost', $errors);
                echo $this->twig->render('index.html.twig', [
                    'key' => 'updatePost', 
                    'status' => 'danger'
                ]);
            }
        }
        else{
            echo $this->twig->render('updatePassword.html.twig',[
                'id' => $this->session->get('id'),
            ]);
        }
    }
    
            
    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'A bientôt');
        echo $this->twig->render('index.html.twig', [
            'status'   => "success",
            'key'      => "logout",
        ]);
    }
    
    public function updateAccount(Parameter $post)
    {
        $this->userDAO->updateAccount($post, $this->session->get('id'));
        $this->session->set('updateAccount', 'Votre compte a bien été mis à jour');
        echo $this->twig->render('index.html.twig', [
            'status'   => "success",
            'key'      => "updateAccount",
        ]);
    }
    
    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('id'));
        $this->session->stop();
        $this->session->start();
        $this->session->set('deleteAccount', 'Votre compte a bien été supprimé');
        echo $this->twig->render('index.html.twig', [
            'status'   => "success",
            'key'      => "deleteAccount",
        ]);
    }
    public function administration()
    {
        $posts = $this->postDAO->getPosts();
        $comments = $this->commentDAO->getAllComments();
        echo $this->twig->render('administration.html.twig', [
            'posts' => $posts,
            'comments' => $comments
        ]);
    }
}