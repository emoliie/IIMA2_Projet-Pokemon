<?php

class PokemonModel extends DB
{

    public static $pokemons = [];

    public function __construct()
    {
        parent::__construct();
    }


    public function findAll(): array
    {
        $pokemons = $this->co->prepare('SELECT * FROM Pokemon');
        $pokemons->execute();

        return $pokemons->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneById(int $id): Pokemon | false
    {
        $pokemons = $this->co->prepare('SELECT * FROM Pokemon WHERE id = :id LIMIT 1');
        $pokemons->setFetchMode(PDO::FETCH_CLASS, 'Pokemon'); 
        $pokemons->execute([
            'id' => $id
        ]);

        return $pokemons->fetch();
    }
}
