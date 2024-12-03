<?php

require './vendor/autoload.php';
 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
require_once './app/utils/Bdd.php';
 
require_once './app/utils/Router.php';
 
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);