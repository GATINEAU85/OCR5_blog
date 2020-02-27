<?php
//require('vendor/autoload.php');

require('src/controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        home();
    }
    elseif ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'about') {
        about();
    }
    elseif ($_GET['action'] == 'contact') {
        contact();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'login') {
        login();
    }
}
else {
    home();
}