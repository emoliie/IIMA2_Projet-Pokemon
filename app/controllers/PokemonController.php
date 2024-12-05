<?php

require_once './app/models/class/FirePokemon.php';
require_once './app/models/class/WaterPokemon.php';
require_once './app/models/class/GrassPokemon.php';

class PokemonController
{
  public function findAll(): void
  {

    $pokemonModel = new PokemonModel();
    $pokemons = $pokemonModel->findAll();

    // require_once './app/views/pokemon/all.php';

    foreach ($pokemons as $pokemon) {
      switch ($pokemon["type"]) {
        case "Water":
          array_push(PokemonModel::$pokemons, new WaterPokemon($pokemon["name"], $pokemon["maxHp"], $pokemon["maxHp"], $pokemon["attackPower"], $pokemon["defense"]));
          break;
        case "Fire":
          array_push(PokemonModel::$pokemons, new FirePokemon($pokemon["name"], $pokemon["maxHp"], $pokemon["maxHp"], $pokemon["attackPower"], $pokemon["defense"]));
          break;
        case "Grass":
          array_push(PokemonModel::$pokemons, new GrassPokemon($pokemon["name"], $pokemon["maxHp"], $pokemon["maxHp"], $pokemon["attackPower"], $pokemon["defense"]));
          break;
      }

    }
    var_dump(PokemonModel::$pokemons);
  }

  // public function findOneById(int $id): void
  // {
  //   $pokemonModel = new PokemonModel();
  //   $pokemon = $pokemonModel->findOneById($id);

  //   require_once './app/views/pokemon/one.php';
  // }
}
