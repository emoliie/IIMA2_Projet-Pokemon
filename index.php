<?php

// Chargement de l'autoload de vendor
require './vendor/autoload.php';
// Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
// Chargement de nos class
require_once './app/utils/DB.php';
require_once './app/models/class/Pokemon.php';
require_once './app/models/class/PokemonModel.php';

require_once './app/utils/Router.php';

// Chargement de notre autoload
require_once './app/utils/Autoload.php';
// Appel de la méthode register qui va recenser notre autoload
Autoload::register();
 
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);