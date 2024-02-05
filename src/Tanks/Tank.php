<?php

namespace Tanks\Tanks;

use Tanks\Tanks\TanksComponents\Armor\Armor;
use Tanks\Tanks\TanksComponents\Chassis\Chassis;
use Tanks\Tanks\TanksComponents\Towers\Towers;

class Tank
{
    public array $crew;
    public Armor $armor;
    public Chassis $chassis;
    public Towers $towers;
    public int $health;

    protected function __construct(
        array $crew,
        Armor $armor,
        Chassis $chassis,
        Towers $towers,
        int $health)
    {
        $this->crew = $crew;
        $this->armor = $armor;
        $this->chassis = $chassis;
        $this->towers = $towers;
        $this->health  = $health;
    }

    public function toString(): string
    {
        return "Здоровье - {$this->health}\n\n
        Броня:\n{$this->armor->toString()}\n\n
        Шасси:\n{$this->chassis->toString()}\n\n
        Башня:\n{$this->towers->toString()}\n\n
        Экипаж:\n\n
        Командир:\n{$this->crew["commander"]->toString()}\n\n
        Заряжающий:\n{$this->crew["gunner"]->toString()}\n\n
        Наводчик:\n{$this->crew["helmsman"]->toString()}\n\n
        Механник:\n{$this->crew["mechanics"]->toString()}\n\n";

    }
}