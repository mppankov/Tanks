<?php

namespace Tanks\Tanks;

class Team
{
    /** @var Tank[] */

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
    public function getTypeTanks(): string
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
            if ($tank->health > 0 && $tank->isCrewAlive()) {

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
            if ($tank->health > 0 && $tank->isCrewAlive() &&
                $tank->tower->gun->rechargeNominal === 0 && $tank->isStunningCrew()) {

                $readyShotTank[] = $tank;
            }
        }
        if (count($readyShotTank)) {

            $randomIndex = array_rand($readyShotTank);

            return $readyShotTank[$randomIndex];
        }
        return null;
    }

    public function chargingTanks(): void
    {
        foreach ($this->tanks as $tank) {

            if ($tank->tower->gun->rechargeNominal > 0) {

                $tank->tower->gun->charging();
            }
        }
    }


    public function treatmentCrew(): void
    {
        foreach ($this->tanks as $tank)
        {
            foreach ($tank->crew as $human)
            {
                if($human->stunning > 0)
                {
                    $human->treatment();
                }
            }
        }
    }

    public function isTanksAlive(): bool
    {
        foreach ($this->tanks as $tank)
        {
            if ($tank->health > 0 && $tank->isCrewAlive()){

                return true;
            }
        }
        return false;
    }
}   
