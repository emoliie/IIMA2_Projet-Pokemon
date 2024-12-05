<?php

class FirePokemon extends Pokemon
{
    public function __construct(
        string $name,
        int $hp,
        int $maxHp,
        int $attackPower,
        int $defense
    ) {
        // Appel du constructeur de la classe parente avec les types et les valeurs de base
        parent::__construct($name, "Fire", $hp, $maxHp, $attackPower, $defense, "Grass", "Water");
    }

    public function specialAbility(Pokemon $opponent): void
    {
        echo "<p>" . $this->getName() . " uses Flamethrower on " . $opponent->getName() . "!</p>";

        // Calcule les dégâts de base
        $damage = $this->attackPower;

        // Applique les effets de type
        if ($opponent->getType() === $this->strength) {
            $damage += self::$bonus;
            echo "<p>It's super effective! " . $opponent->getName() . " takes extra damage.</p>";
        }

        if ($opponent->getType() === $this->weakness) {
            $damage -= self::$penalty;
            echo "<p>It's not very effective... " . $opponent->getName() . " takes less damage.</p>";
        }

        // Applique les dégâts calculés à l'adversaire
        $opponent->receiveDamage($damage);
    }
}
