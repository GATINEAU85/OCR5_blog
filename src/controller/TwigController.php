<?php

namespace App\src\controller;
use App\config\Request;

class TwigController
{
    protected $session;

    public function twigLoader()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
        
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, //__DIR__.'/tmp'
        ]);

        //Ajout des variables de sessions dans les Twigs
        $twig->addGlobal('session', $this->session);
        
        return($twig);
    }
}
