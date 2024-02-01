<?php

namespace mppankov\tanks\Objects;

class Tank
{
    public float $damage;
    public float $health;
    public float $numberCriticalShot;
    public float $dodging;
    public float $dynamicProtection;
    public float $rechargeStatus;
    public float $timeRecharge;

    protected function __construct(
        float $damage,
        float $health,
        float $numberCriticalShot,
        float $dodging,
        float $dynamicProtection,
        float $rechargeStatus,
        float $timeRecharge)
    {
        $this->damage = $damage;
        $this->health = $health;
        $this->numberCriticalShot = $numberCriticalShot;
        $this->dodging = $dodging;
        $this->dynamicProtection = $dynamicProtection;
        $this->rechargeStatus = $rechargeStatus;
        $this->timeRecharge = $timeRecharge;
    }

    public function toString(): string
    {
        return "Урон: {$this->damage}\nЗдоровье: {$this->health}\n\n";
    }

    public function processRecharge(): float
    {
        if($this->rechargeStatus > 0){
            $this->rechargeStatus = $this->rechargeStatus - 1;
        }
        return $this->rechargeStatus;
    }

    public function getDamageWithRandom(): float
    {
        if(rand(1, 10) == $this->numberCriticalShot) {
            return 100;
        } else {
            return $this->damage;
        }
    }

    public function getChanceDodge(): bool
    {
        if(rand(1, 10) == $this->dodging) {
            return true;
        } else {
            return false;
        }
    }

    public function getDynamicProtection(): bool
    {
        if(rand(1, 10) == $this->dynamicProtection) {
            return true;
        } else {
            return false;
        }
    }
}