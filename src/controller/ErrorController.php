<?php

namespace App\src\controller;

class ErrorController
{
    public function errorNotFound()
    {
        include "../config/twigConfig.php";
        echo $twig->render('error_404.html.twig');
    }    
    
    public function errorServer()
    {
        include "../config/twigConfig.php";
        echo $twig->render('error_500.html.twig');
    }
}