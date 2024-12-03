<?php

abstract class Pokemon
{

    use SoinTrait;

    // Propriétés
    protected string $nom;
    protected string $type;
    protected int $pointsDeVie;
    protected int $pointsDeVieMax;
    protected int $puissanceAttaque;
    protected int $defense;
    protected string $force;
    protected string $faiblesse;

    // Statiques
    public static $bonus = 20;
    public static $malus = 10;

    // Constructeur
    public function __construct(
        string $nom,
        string $type,
        int $pointsDeVie,
        int $pointsDeVieMax,
        int $puissanceAttaque,
        int $defense,
        string $force,
        string $faiblesse
    ) {
        $this->nom = $nom;
        $this->type = $type;
        $this->pointsDeVie = $pointsDeVie;
        $this->pointsDeVieMax = $pointsDeVieMax;
        $this->puissanceAttaque = $puissanceAttaque;
        $this->defense = $defense;
        $this->force = $force;
        $this->faiblesse = $faiblesse;
    }

    // Méthodes
    public function attaquer(Pokemon $adversaire): void
    {
        $degats = max(0, $this->puissanceAttaque - $adversaire->defense); // Le résultat ne peut pas être négatif
        $adversaire->recevoirDegats($degats);
        echo "$this->nom attaque $adversaire->nom et inflige $degats points de dégâts !";
    }

    public function recevoirDegats(int $degats): void
    {
        $this->pointsDeVie = max(0, $this->pointsDeVie - $degats);
        echo "$this->nom reçoit $degats points de dégâts et a maintenant $this->pointsDeVie points de vie.";
    }

    public function estKO(): bool
    {
        return $this->pointsDeVie === 0;
    }

    // Méthode abstraite
    abstract public function capaciteSpeciale(Pokemon $adversaire): void;
}
