<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;

    public function __construct()
    {
//        J'appel Twig ici
//        Appeler en paramètre twig
        $this->frontController = new FrontController();
        $this->ErrorController = new ErrorController();
    }
    public function run()
    {
        try{
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'home') {
                    $this->frontController->home();
                }
                elseif ($_GET['action'] == 'listPosts') {
                    $this->frontController->listPosts();   
                }
                elseif ($_GET['action'] == 'about') {
                    $this->frontController->about();   
                }
                elseif ($_GET['action'] == 'contact') {
                    $this->frontController->contact();   
                }
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->frontController->post();   
                    }
                    else {
                        $this->ErrorController->errorNotFound();
                    }
                }
                elseif ($_GET['action'] == 'login') {
                    $this->frontController->login();
                }
                else{
                    $this->ErrorController->errorNotFound();
                }
            }
            else {
                $this->frontController->home();
            }
        }
        catch(Exception $e){
            $this->ErrorController->errorServer();
        }
    }
}