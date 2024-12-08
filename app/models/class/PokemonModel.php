<?php

class PokemonModel extends DB
{
    public static $pokemons = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retourne la liste de tous les pokemons depuis la base de données.
     * @return Pokemon[]
     */
    public function findAll(): array
    {
        $pokemons = $this->co->prepare('SELECT * FROM Pokemon');
        $pokemons->execute();

        /**
         * array_map prend en params :
         * - un callback (fonction appelée avec chaque élément du tableau), ici on transforme chaque "semblant" de pokemon en une vraie instance de Pokemon avec son type.
         * - un tableau : le tableau fetchAll
         */
        return array_map(
            array($this, "asPokemon"),
            $pokemons->fetchAll(PDO::FETCH_ASSOC)
        );
    }

    /**
     * Retourne un pokemon depuis la base de données.
     * @param int $id Identifiant du pokemon
     * @return Pokemon pokemon
     */
    public function findOneById(int $id): Pokemon | null
    {
        $pokemons = $this->co->prepare('SELECT * FROM Pokemon WHERE id = :id LIMIT 1');
        $pokemons->setFetchMode(PDO::FETCH_ASSOC);
        $pokemons->execute([
            'id' => $id
        ]);

        return $this->asPokemon($pokemons->fetch());
    }

    /** 
     * Transforme un pokemon de la bdd en une vraie instance de pokemon typé
     * @param $object
     * @return Pokemon pokemon
     */
    private function asPokemon($object): Pokemon | null
    {
        if (!$object) {
            return null;
        }

        switch ($object["type"]) {
            case "Water":
                return new WaterPokemon($object["id"], $object["name"], $object["maxHp"], $object["maxHp"], $object["attackPower"], $object["defense"], base64_encode($object["image"]));
            case "Fire":
                return new FirePokemon($object["id"], $object["name"], $object["maxHp"], $object["maxHp"], $object["attackPower"], $object["defense"], base64_encode($object["image"]));
            case "Grass":
                return new GrassPokemon($object["id"], $object["name"], $object["maxHp"], $object["maxHp"], $object["attackPower"], $object["defense"], base64_encode($object["image"]));
        }
        return null;
    }
}
