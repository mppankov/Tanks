<?php

namespace Tanks\Tanks\TanksComponents\Guns;

class Guns
{
    public int $power;
    public int $penetration;

    public int $rechargeRate;
    public int $rechargeNominal;

    public function __construct(int $power, int $penetration, int $rechargeRate, int $rechargeNominal)
    {
        $this->power = $power;
        $this->penetration = $penetration;
        $this->rechargeRate = $rechargeRate;
        $this->rechargeNominal = $rechargeNominal;
    }

    public function toString(): string
    {
        return "Мощность - {$this->power}\nПробиваемость - {$this->penetration}\nСкорость перезарядки - {$this->rechargeRate}\nСтатус перезарядки - {$this->rechargeNominal}";
    }

    public function recharge(): void
    {
        $this->rechargeNominal = $this->rechargeRate;
    }

    public function charging(): void
    {
        $this->rechargeNominal = $this->rechargeNominal - 1;
    }
}
