<?php
require('src/model/model.php');

$req = getBillets();

require('templates/home.html.twig');
?>