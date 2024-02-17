<?php

namespace Tanks\Tanks\TanksComponents\Guns;

abstract class Gun
{
    public int $power;
    public int $penetration;
    public int $rechargeRate;
    public int $rechargeNominal;

    public function __construct(
        int $power = 10,
        int $penetration = 10,
        int $rechargeRate = 3,
        int $rechargeNominal = 0)
    {
        $this->power = $power;
        $this->penetration = $penetration;
        $this->rechargeRate = $rechargeRate;
        $this->rechargeNominal = $rechargeNominal;
    }

    public function toString(): string
    {
        return " -Мощность - {$this->power}\n -Пробиваемость - {$this->penetration}\n -Скорость перезарядки - {$this->rechargeRate}\n -Статус перезарядки - {$this->rechargeNominal}";
    }

    public function recharge(): void
    {
        $this->rechargeNominal = $this->rechargeRate;
    }

    public function charging(): void
    {
        $this->rechargeNominal -= 1;
    }
}
