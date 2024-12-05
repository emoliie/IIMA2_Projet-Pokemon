<?php

class Fight
{
    // Properties
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;

    // Constructor
    public function __construct(
        Pokemon $pokemon1,
        Pokemon $pokemon2
    ) {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    // Methods
    public function startFight(): void
    {
        echo "<p>The fight begins between " . $this->pokemon1->getName() . " and " . $this->pokemon2->getName() . "!</p>";

        while (!$this->pokemon1->isKO() && !$this->pokemon2->isKO()) {
            $this->combatTurn($this->pokemon1, $this->pokemon2);
            if (!$this->pokemon2->isKO()) {
                break;
            }
            $this->combatTurn($this->pokemon2, $this->pokemon1);
        }

        $this->determineWinner();
    }

    public function combatTurn(Pokemon $attacker, Pokemon $defender): void {
        echo "<p>It's " . $attacker->getName() . "'s turn to attack!</p>";
        $attacker->attack($defender);
        if ($defender->isKO()) {
            echo "<p>" . $defender->getName() . " is KO!</p>";
        } else {
            echo "<p>" . $defender->getHp() . " HP left for " . $defender->getName() . "!</p>";
        }
    }

    public function determineWinner(): void {
        if ($this->pokemon1->isKO()) {
            echo "<p>" . $this->pokemon2->getName() . " wins the fight!</p>";
        } else {
            echo "<p>" . $this->pokemon1->getName() . " wins the fight!</p>";
        }
    }
}