<?php

namespace Tanks\Tanks\TanksComponents\Armor;

abstract class Armor
{
    public int $armor;

    public function __construct(int $armor = 10)
    {
        $this->armor = $armor;
    }

    public function toString(): string
    {
        return "Защита - {$this->armor}";
    }
}