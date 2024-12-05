<?php

class PokemonController{
    public function findAll(): void
    {
      $pokemonModel = new PokemonModel();
      $pokemons = $pokemonModel->findAll();
   
      require_once './app/views/pokemon/all.php';
    }
   
    public function findOneById(int $id): void
    {
      $pokemonModel = new PokemonModel();
      $pokemon = $pokemonModel->findOneById($id);
   
      require_once './app/views/pokemon/one.php';
    }
  }