<?php

namespace Tanks\Game\GameUtils;

use Tanks\Tanks\Tank;

class UtilsAttack
{
    public Tank $tank;
    public function __construct(Tank $tank)
    {
        $this->tank = $tank;
    }
    public function damageCrewWithoutPenetration(): void
    {
        foreach ($this->tank->crew as $human) {

            if ($human->health > 0) {

                $human->health -= rand(0, 20);

                $human->stunning();
            }
            if($human->health <= 0){

                $human->health = 0;
            }
        }
        $this->getTypeHumanAlive();
    }

    public function damageCrewWithPenetration(): void
    {
        foreach ($this->tank->crew as $human) {
            if ($human->health > 0) {

                $human->health -= rand(20, 40);

                $human->stunning();
            }
            if($human->health <= 0){

                $human->health = 0;
            }
        }
        $this->getTypeHumanAlive();
    }

    public function damageCrewWithCriticalHit(): void
    {
        foreach ($this->tank->crew as $human) {

            if ($human->health > 0) {

                $human->health -= rand(40, 100);

                $human->stunning();
            }
            if($human->health <= 0){

                $human->health = 0;
            }
        }
            $this->getTypeHumanAlive();
    }

    public function getTypeHumanAlive(): void
    {
        foreach ($this->tank->crew as $human) {

            if ($human->type === "COMMANDER") {

                if($human->health === 0) {

                    echo "Коммандир мёртв\n";
                }

            } elseif ($human->type === "GUNNER") {

                if($human->health === 0) {

                    echo "Заряжающий мёртв\n";
                }

            } elseif ($human->type === "HELMSMAN") {

                if($human->health === 0) {

                    echo "Наводчик мёртв\n";
                }

            } elseif ($human->type === "MECHANICS") {

                if($human->health === 0) {

                    echo "Механник мёртв\n";
                }
            }
        }
    }

    public function randTankCriticalPenetration(): bool
    {
        if($this->tank->tower->gun->penetration >= rand(1, 100)){
            return true;
        }
        return false;
    }

    public function randTankShotPower(): float
    {
        return $this->tank->tower->gun->power * rand(1, 2);
    }

    public function randChanceDodge(): bool
    {
        if($this->tank->chassis >= rand(0, 100)){
            return true;
        }
        return false;
    }

    public function randChanceShot(): bool
    {
        if($this->tank->tower->turningSpeed >= rand(0, 100)){

            return true;
        }
        return false;
    }
}