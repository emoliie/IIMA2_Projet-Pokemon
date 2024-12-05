<?php

abstract class Pokemon {

    // use HealTrait;

    // Propriétés
    protected string $name;
    protected string $type;
    protected int $hp;
    protected int $maxHp;
    protected int $attackPower;
    protected int $defense;
    protected string $strength;
    protected string $weakness;

    // Statiques
    public static $bonus = 20;
    public static $penalty = 10;

    // Constructeur
    public function __construct(
        string $name,
        string $type,
        int $hp,
        int $maxHp,
        int $attackPower,
        int $defense,
        string $strength,
        string $weakness
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->hp = $hp;
        $this->maxHp = $maxHp;
        $this->attackPower = $attackPower;
        $this->defense = $defense;
        $this->strength = $strength;
        $this->weakness = $weakness;
    }

    // Méthodes
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

    public function attack(Pokemon $opponent): void
    {
        $damage = max(0, $this->attackPower - $opponent->defense); // Damage cannot be negative
        $opponent->receiveDamage($damage);
        echo "<p>" . $this->name . " attacks " . $opponent->name . " and deals " . $damage . " damage points!</p>";
    }

    public function receiveDamage(int $damage): void
    {
        $this->hp = max(0, $this->hp - $damage);
        echo "<p>" . $this->name . " receives " . $damage . " damage points and now has " . $this->hp . " HP left.</p>";
    }

    public function isKO(): bool
    {
        return $this->hp === 0;
    }

    // Méthode abstraite
    abstract public function specialAbility(Pokemon $opponent): void;
}
