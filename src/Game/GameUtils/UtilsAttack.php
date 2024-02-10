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
        foreach ($this->tank->crew as $human)
        {
            $human->health -= rand(0, 20);
        }
    }

    public function damageCrewWithPenetration(): void
    {
        foreach ($this->tank->crew as $human)
        {
            $human->health -= rand(20, 40);
        }
    }

    public function damageCrewWithCriticalHit(): void
    {
        foreach ($this->tank->crew as $human)
        {
            $human->health -= rand(40, 100);
        }
    }

    public function getTypeHumanLife(): string
    {
        foreach ($this->tank->crew as $human) {

            if ($human->type === "COMMANDER") {

                if ($human->health <= 0) {

                    $human->health = 0;

                    return "Коммандир мёртв";
                }

            } elseif ($human->type === "GUNNER") {

                if ($human->health <= 0) {

                    $human->health = 0;

                    return "Заряжающий мёртв";
                }

            } elseif ($human->type === "HELMSMAN") {

                if ($human->health <= 0) {

                    $human->health = 0;

                    return "Наводчик мёртв";
                }

            } elseif ($human->type === "MECHANICS") {

                if ($human->health <= 0) {

                    $human->health = 0;

                    return "Механник мёртв";
                }
            }

        }
        return "Экипаж жив!";
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