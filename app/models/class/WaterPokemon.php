<?php

class WaterPokemon extends Pokemon
{
    public function __construct(
        int $id,
        string $name,
        int $hp,
        int $maxHp,
        int $attackPower,
        int $defense,
        string $image
    ) {
        // Appel du constructeur de la classe parente avec les types et les valeurs de base
        parent::__construct($id, $name, "Water", $hp, $maxHp, $attackPower, $defense, "Fire", "Grass", "Hydrocanon", $image);
    }

    public function specialAbility(Pokemon $opponent): int
    {
        // Calcule les dégâts de base
        $damage = $this->attackPower;

        // Applique les effets de type (bonus si type avantageux ou malus si type désavantageux)
        if ($opponent->getType() === $this->strength) {
            $damage += self::$bonus;
        }

        if ($opponent->getType() === $this->weakness) {
            $damage -= self::$penalty;
        }

        // Applique les dégâts calculés à l'adversaire
        $opponent->receiveDamage($damage);

        return $damage;
    }

    public function getIcon(): string
    {
        return '/assets/water.png';
    }
}
