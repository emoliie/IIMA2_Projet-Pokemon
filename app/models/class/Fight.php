<?php

// Classe combat

class Fight
{
    // Propriétés
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;
    private array $data;
    private Pokemon $winner;
    private Pokemon $loser;

    const int SPECIAL_ATTACK_RATE = 30;

    // Constructeur
    public function __construct(
        Pokemon $pokemon1,
        Pokemon $pokemon2
    ) {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
        $this->data = [];
    }

    // Méthodes


    public function getAttacker(): Pokemon
    {
        return $this->pokemon1;
    }

    public function getDefender(): Pokemon
    {
        return $this->pokemon2;
    }

    public function getData(): array 
    {
        return $this->data;
    }

    public function getWinner(): Pokemon 
    {
        return $this->winner;
    }

    public function getLoser(): Pokemon 
    {
        return $this->loser;
    }

    // Débuter le Combat
    public function startFight(): void
    {
        // echo "<p>The fight begins between " . $this->pokemon1->getName() . " and " . $this->pokemon2->getName() . "!</p>";

        while (!$this->pokemon1->isKO() && !$this->pokemon2->isKO()) {
            array_push($this->data, $this->combatTurn($this->pokemon1, $this->pokemon2));
            if ($this->pokemon2->isKO()) {
                break;
            }
            
            array_push($this->data, $this->combatTurn($this->pokemon2, $this->pokemon1));
        }

        $this->determineWinner();
    }

    // Tour de combat

    /**
     * Permet de réaliser un tour d'un combat entre deux Pokémons `attacker` et `defender`
     * @param Pokemon $attacker Pokémon attaquant
     * @param Pokemon $defender Pokémon opposant
     * @return array Détails sur le tour (attaquant, defenseur, type d'attaque, dégâts infligés, points de vie restants du défenseur)
     */

    public function combatTurn(Pokemon $attacker, Pokemon $defender): array
    {
        // echo "<p>It's " . $attacker->getName() . "'s turn to attack!</p>";

        $fightData = [
            "attacker" => $attacker,
            "defender" => $defender
        ];

        $randomNum = rand(0, 100);
        if (self::SPECIAL_ATTACK_RATE <= $randomNum) {
            $fightData["attackType"] = "special";
            $fightData["damage"] = $attacker->specialAbility($defender);
        } else {
            $fightData["attackType"] = "normal";
            $fightData["damage"] = $attacker->attack($defender);
        }

        $fightData["hpLeft"] = $defender->getHp();

        return $fightData;
    }

    
    public function determineWinner(): void
    {
        if ($this->pokemon1->isKO()) {
            $this->winner = $this->pokemon2;
            $this->loser = $this->pokemon1;
            // echo "<p>" . $this->pokemon2->getName() . " wins the fight!</p>";
        } else {
            $this->winner = $this->pokemon1;
            $this->loser = $this->pokemon2;
            // echo "<p>" . $this->pokemon1->getName() . " wins the fight!</p>";
        }
    }
}
