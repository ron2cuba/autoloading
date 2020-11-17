<?php

spl_autoload_register(function($className){
    var_dump($className);
    die();
});

// require 'Classes/Calcul.php';

$instance = new App\Calcul();

$resultat = $instance->additionner(2, 4);

var_dump($resultat);

echo "yeah dfhn!";
