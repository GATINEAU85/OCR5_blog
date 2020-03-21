<?php

namespace App\src\controller;

class TwigController
{
    public function twigLoader()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, //__DIR__.'/tmp'
        ]);
        
        return($twig);
    }
}
