<?php

class PokemonFeu extends Pokemon
{
    public function __construct(
        string $nom,
        int $pointsDeVie,
        int $pointsDeVieMax,
        int $puissanceAttaque,
        int $defense
    ) {
        parent::__construct($nom, "Feu", $pointsDeVie, $pointsDeVieMax, $puissanceAttaque, $defense, "Plante", "Eau");
    }

    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $degats = $this->puissanceAttaque;
        if ($adversaire->type == $this->force) {
            $degats =+ self::$bonus;
        }

        if ($adversaire->type == $this->faiblesse) {
            $degats=- self::$malus;
        }

        $adversaire->recevoirDegats($degats);
    }
}
