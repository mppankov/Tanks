<?php

namespace Tanks\Tanks;

class Team
{
    public array $tanks;
    public string $name;

    public function __construct(array $tanks, string $name)
    {
        $this->tanks = $tanks;
        $this->name = $name;
    }
    public function toString(): string
    {
        return "Название команды: {$this->name}\n";
    }

    public function getTypeTank(): string
    {
        $specification = [];

        foreach ($this->tanks as $i => $tank)
        {
            if ($tank instanceof HeavyTank){
                $specification .= $i + 1 . " Тяжелый танк:\n\n{$tank->toString()}";
            } elseif ($tank instanceof MediumTank){
                $specification .= $i + 1 . " Средний танк:\n\n{$tank->toString()}";
            } elseif ($tank instanceof LiteTank){
                $specification .= $i + 1 . " Легкий танк:\n\n{$tank->toString()}";
            }
        }
        return $specification;
    }
    public function getRandAliveTank(): ? Tank
    {
        $aliveTank = [];

        foreach ($this->tanks as $tank)
        {
            if ($tank->health > 0) {

                $aliveTank[] = $tank;
            }
        }
        if (count($aliveTank)) {

            $randomIndex = array_rand($aliveTank);

            return $aliveTank[$randomIndex];
        }
        return null;
    }

    public function getRandomReadyTank(): ? Tank
    {
        $readyShotTank = [];

        foreach ($this->tanks as $tank)
        {
            if ($tank->health > 0 && $tank->towers->guns->rechargeNominal == 0) {

                $readyShotTank[] = $tank;
            }
        }
        if (count($readyShotTank)) {

            $randomIndex = array_rand($readyShotTank);

            return $readyShotTank[$randomIndex];
        }
        return null;
    }

    public function isTeamAlive(): bool
    {
        foreach ($this->tanks as $tank)
        {
            if ($tank->health > 0){
                return true;
            }
        }
        return false;
    }
}   
