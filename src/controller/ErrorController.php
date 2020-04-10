<?php

namespace App\src\controller;

class ErrorController extends Controller
{
    public function errorNotFound()
    {
        return $this->twig->render('error_404.html.twig');
    }    
    
    public function errorServer()
    {
        return $this->twig->render('error_500.html.twig');
    }
}