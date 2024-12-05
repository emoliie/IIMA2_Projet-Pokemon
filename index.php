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
 
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);

// require_once './app/models/class/FirePokemon.php';
// require_once './app/models/class/WaterPokemon.php';
// require_once './app/models/class/GrassPokemon.php';

// $Charmander = new FirePokemon('Charmander', 100, 100, 20, 10);
// $Bulbizard = new GrassPokemon('Bulbizard', 90, 90, 30, 15);
// $Squirtle = new WaterPokemon('Squirtle', 100, 100, 30, 5);

// $pokemons = [$Charmander, $Bulbizard, $Squirtle];

// require_once './app/models/class/Fight.php';

// $fight1 = new Fight($Charmander, $Squirtle);
// $fight1->startFight();