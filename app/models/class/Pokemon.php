<?php

abstract class Pokemon
{
    // use HealTrait;

    // Propriétés
    protected int $id;
    protected string $name;
    protected string $type;
    protected int $hp;
    protected int $maxHp;
    protected int $attackPower;
    protected int $defense;
    protected string $strength;
    protected string $weakness;
    protected string $specialAbilityName;
    protected string $image;

    // Statiques
    public static $bonus = 20;
    public static $penalty = 10;

    // Constructeur
    public function __construct(
        int $id,
        string $name,
        string $type,
        int $hp,
        int $maxHp,
        int $attackPower,
        int $defense,
        string $strength,
        string $weakness,
        string $specialAbilityName,
        string $image
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->maxHp = $maxHp;
        $this->attackPower = $attackPower;
        $this->defense = $defense;
        $this->strength = $strength;
        $this->weakness = $weakness;
        $this->specialAbilityName = $specialAbilityName;
        $this->image = $image;
    }

    // Méthodes

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getAttackPower(): int
    {
        return $this->attackPower;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getSpecialAbilityName(): string
    {
        return $this->specialAbilityName;
    }

    public function getImage() :string
    {
        return $this->image;
    }

    /**
     * Lance une attaque normale vers le pokémon `opponent`
     * @param Pokemon $opponent Pokémon adverse
     * @return int Dégâts infligés
     */
    public function attack(Pokemon $opponent): int
    {
        $damage = max(0, $this->attackPower - $opponent->defense); // Damage cannot be negative
        $opponent->receiveDamage($damage);
        return $damage;
    }

    /**
     * Permet de recevoir des dégâts.
     * @param int $damage Dégâts
     */
    public function receiveDamage(int $damage): void
    {
        $this->hp = max(0, $this->hp - $damage);
    }

    /**
     * Permet de déterminer si le pokemon est KO ou non.
     * @return bool KO
     */
    public function isKO(): bool
    {
        return $this->hp === 0;
    }


    // Méthodes abstraites
    /**
     * Lance une attaque spéciale vers le pokémon `opponent`
     * @param Pokemon $opponent Pokémon adverse
     * @return int Dégâts infligés
     */
    abstract public function specialAbility(Pokemon $opponent): int;

    /**
     * Permet de récupérer le chemin de l'icône de l'élément du pokemon.
     * @return string Chemin de l'icône.
     */
    abstract public function getIcon(): string;
}
