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
        parent::__construct($name, "Fire", $hp, $maxHp, $attackPower, $defense, "Grass", "Water");
    }

    public function specialAbility(Pokemon $opponent): void
    {
        echo "<p>" . $this->name . " uses Flamethrower on " . $opponent->name . "!</p>";
        $damage = $this->attackPower;

        if ($opponent->type === $this->strength) {
            $damage += self::$bonus;
        }

        if ($opponent->type === $this->weakness) {
            $damage -= self::$penalty;
        }

        $opponent->receiveDamage($damage);
    }
}
