<?php

namespace Tanks\Tanks;

use Tanks\Game\GameUtils\UtilsAttack;
use Tanks\Tanks\Crew\Human;
use Tanks\Tanks\TanksComponents\Armor\Armor;
use Tanks\Tanks\TanksComponents\Chassis\Chassis;
use Tanks\Tanks\TanksComponents\Towers\Tower;

class Tank
{
    use UtilsAttack;

    /** @var Human[]  */
    public array $crew;
    public Armor $armor;
    public Chassis $chassis;
    public Tower $tower;
    public int $health;

    public function __construct(
        array $crew,
        Armor $armor,
        Chassis $chassis,
        Tower $tower,
        int $health)
    {
        $this->crew = $crew;
        $this->armor = $armor;
        $this->chassis = $chassis;
        $this->tower = $tower;
        $this->health  = $health;
    }

    public function toString(): string
    {
        return "Здоровье - {$this->health}\nБроня:\n{$this->armor->toString()}\nШасси:\n{$this->chassis->toString()}\nБашня:\n{$this->tower->toString()}\nЭкипаж:\n{$this->getTypeCrew()}";
    }

    public function getTypeCrew(): string
    {
        $compositionTeam = [];

        foreach ($this->crew as $i => $human) {

            if ($human->type === Human::COMMANDER){

                $compositionTeam .= $i + 1 . " Коммандир:\n{$human->toString()}\n\n";

            } elseif ($human->type === Human::HELMSMAN){

                $compositionTeam .= $i + 1 . " Заряжающий:\n{$human->toString()}\n\n";

            } elseif ($human->type === Human::GUNNER){

                $compositionTeam .= $i + 1 . " Наводчик:\n{$human->toString()}\n\n";

            } elseif ($human->type === Human::MECHANICS){

                $compositionTeam .= $i + 1 . " Механник:\n{$human->toString()}\n\n";
            }
        }
        return $compositionTeam;
    }

    public function getCrewMember(string $type): ? Human
    {
        foreach ($this->crew as $human)
        {
            if($human->type === $type){

                return $human;
            }
        }
        return null;
    }
}