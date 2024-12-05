<?php

interface Fighter {
    public function fight($opponent): void;

    public function useSpecialAttack($opponent): void;
}