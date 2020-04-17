<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $request;
    private $backController;

    public function __construct()
    {
        $this->request = new Request();
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->ErrorController = new ErrorController();
    }
    public function run()
    {
        $route = $this->request->getGet()->get('action');
        try{
            if(isset($route)){
            //Manage navigation routes
                if ($route == 'home') {
                    $this->frontController->home();
                }
                elseif ($route == 'listPosts') {
                    $this->frontController->listPosts();   
                }
                elseif ($route == 'about') {
                    $this->frontController->about();   
                }
                elseif ($route == 'contact') {
                    $this->frontController->contact();   
                }
            //Manage CRUD POST routes
                elseif ($route == 'addPost') {
                    $this->backController->addPost($this->request->getPost());   
                }
                elseif ($route == 'updatePost') {
                    $this->backController->updatePost($this->request->getPost(), $this->request->getGet()->get('id'));   
                }
                elseif($route === 'deletePost'){
                    $this->backController->deletePost($this->request->getGet()->get('id'));
                }
                elseif ($route == 'post') {
                    if ($this->request->getGet()->get('id') && $this->request->getGet()->get('id') > 0) {
                        $this->frontController->post($this->request->getGet()->get('id'));   
                    }
                    else {
                        $this->ErrorController->errorNotFound();
                    }
                }
            //Manage CRUD COMMENTS routes
                elseif($route === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('id'), $this->request->getSession()->get('id'));
                }
                elseif($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('post'), $this->request->getGet()->get('id'));
                }
            //Manage user routes
                elseif ($_GET['action'] == 'login') {
                    $this->frontController->login($this->request->getPost());
                }                
                elseif ($_GET['action'] == 'logout') {
                    $this->backController->logout();
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif ($_GET['action'] == 'createAccount') {
                    $this->frontController->createAccount($this->request->getPost());
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'updateAccount'){
                    $this->backController->updateAccount($this->request->getPost());
                }                
                elseif($route === 'deleteAccount'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
            //Manage contact form
                elseif ($route == 'contactMe') {
                    $this->frontController->contactMe();   
                }
                else{
                    $this->ErrorController->errorNotFound();
                }
            }
        //Default Routes
            else {
                $this->frontController->home();
            }
        }
        //Catch error if a server Error appear
        catch(Exception $e){
            $this->ErrorController->errorServer();
        }
    }
}