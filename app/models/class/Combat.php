<?php

class Combat
{

    // Propriétés 
    private Pokemon $pokemon1;
    private Pokemon $pokemon2;


    // Constructeur
    public function __construct(
        Pokemon $pokemon1,
        Pokemon $pokemon2
    ) {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    // Méthodes
    public function demarrerCombat(): void
    {
        echo "<p>Le combat commence entre" . $this->pokemon1->getNom() . "et" . $this->pokemon2->getNom() . "!</p?";

        while (!$this->pokemon1->estKO() && !$this->pokemon1->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if (!$this->pokemon1->estKO()) {
                break;
            }
            $this->tourDeCombat($this->pokemon2, $this->pokemon1);
        }

        $this->determinerVainqueur();

    }

    public function tourDeCombat(Pokemon $attaquant, Pokemon $defenseur): void {
        echo "<p>Au tour de". $attaquant->getNom() . "d'attaquer!</p>";
        $attaquant->attaquer($defenseur);
        if ($defenseur->estKO()) {
            echo "<p>".$defenseur->getNom() ."est KO!</p>";
        } else {
            echo "<p>Il reste". $defenseur->getPointsDeVie() ."PV à". $defenseur->getNom() . "!</p>";
        }
    }

    public function determinerVainqueur() {
        if ($this->pokemon1->estKO()) {
            echo "<p>". $this->pokemon1->getNom() ."remporte le combat !</p>";
        } else {
            echo "<p>". $this->pokemon2->getNom() ."remporte le combat !</p>";
        }
    }
}
