<?php

require_once './app/models/class/FirePokemon.php';
require_once './app/models/class/WaterPokemon.php';
require_once './app/models/class/GrassPokemon.php';
require_once './app/utils/RenderTrait.php';
require_once './app/models/class/Fight.php';


class PokemonController
{
  use Render;
  public function findAll(): void
  {
    $pokemonModel = new PokemonModel();
    $pokemons = $pokemonModel->findAll();

    foreach ($pokemons as $pokemon) {
      array_push(PokemonModel::$pokemons, $pokemon);
    }

    // Prépatation du tableau à envoyer au layout
    $data = [
      'title' => 'Liste des pokemons',
      'pokemons' => PokemonModel::$pokemons
    ];

    // Rendu avec layout
    $this->renderView('pokemon/all', $data, 'layout');
  }

  public function findOneById(int $id): void
  {
    $pokemonModel = new PokemonModel();
    $pokemon = $pokemonModel->findOneById($id);

    require_once './app/views/pokemon/one.php';
  }

  public function fight(): void
  {
    $this->renderView('pokemon/fight');
  }

  /**
   * 
   * Permet de lancer un combat entre deux pokemon d'identification `id1` et `id2` (optionnel)
   * 
   * Si les identifiants ne sont pas renseignés (on a envoyé le formulaire de combat dans `all.php`),
   * on fait une redirection vers le bon lien.
   * 
   * Exemple: on obtient une requête POST /pokemon/battle avec id1 et id2
   *    => redirection vers /pokmon/battle/`id1`/`id2` 
   * 
   * @param int $id1 identifiant du pokemon 1
   * @param int $id2 identifiant du pokemon 2
   */
  public function battle(int $id1 = -1, int $id2 = -1): void
  {

    if ($id1 == -1 && $id2 == -1) {
      $this->renderView('pokemon/battle', ["redirect" => true], 'layout');
    } else {
      $pokemonModel = new PokemonModel();
      $pokemon1 = $pokemonModel->findOneById($id1);
      $pokemon2 = $pokemonModel->findOneById($id2);

      $fight = new Fight($pokemon1, $pokemon2);
      $fight->startFight();

      $data = [
        "fight" => $fight
      ];

      $this->renderView('pokemon/battle', $data, 'layout');
    }
  }
}
