<?php

class Fight
{
    // Propriétés
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;

    const int SPECIAL_ATTACK_RATE = 30;

    // Constructeur
    public function __construct(
        Pokemon $pokemon1,
        Pokemon $pokemon2
    ) {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    // Méthodes
    public function startFight(): void
    {
        echo "<p>The fight begins between " . $this->pokemon1->getName() . " and " . $this->pokemon2->getName() . "!</p>";

        $i=1;

        while (!$this->pokemon1->isKO() && !$this->pokemon2->isKO()) {
            echo "<b>=======================". $i ."=======================</b>";
            $this->combatTurn($this->pokemon1, $this->pokemon2);
            if ($this->pokemon2->isKO()) {
                break;
            }
            $i+=1;
            echo "<b>=======================". $i ."=======================</b>";
            $this->combatTurn($this->pokemon2, $this->pokemon1);
            $i+=1;
        }

        $this->determineWinner();
    }

    public function combatTurn(Pokemon $attacker, Pokemon $defender): void
    {
        echo "<p>It's " . $attacker->getName() . "'s turn to attack!</p>";

        $randomNum = rand(0, 100);
        if (self::SPECIAL_ATTACK_RATE <= $randomNum) {
            $attacker->specialAbility($defender);
        } else {
            $attacker->attack($defender);
        }

        if ($defender->isKO()) {
            echo "<p>" . $defender->getName() . " is KO!</p>";
        } else {
            echo "<p>" . $defender->getHp() . " HP left for " . $defender->getName() . "!</p>";
        }
    }

    public function determineWinner(): void
    {
        if ($this->pokemon1->isKO()) {
            echo "<p>" . $this->pokemon2->getName() . " wins the fight!</p>";
        } else {
            echo "<p>" . $this->pokemon1->getName() . " wins the fight!</p>";
        }
    }
}
