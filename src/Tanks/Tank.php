<?php

namespace Tanks\Tanks;

use Tanks\Tanks\TanksComponents\Armor\Armor;
use Tanks\Tanks\TanksComponents\Chassis\Chassis;
use Tanks\Tanks\TanksComponents\Towers\Towers;

class Tank
{
    public Armor $armor;
    public Chassis $chassis;
    public Towers $towers;
    public int $health;

    protected function __construct(
        Armor $armor,
        Chassis $chassis,
        Towers $towers,
        int $health)
    {
        $this->armor = $armor;
        $this->chassis = $chassis;
        $this->towers = $towers;
        $this->health  = $health;
    }

    public function toString(): string
    {
        return "Здоровье: {$this->health}\n\nБроня:\n{$this->armor->toString()}\n\nШасси:\n{$this->chassis->toString()}\n\nБашня:\n{$this->towers->toString()}\n\n";

    }
}