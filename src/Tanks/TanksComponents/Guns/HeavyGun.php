<?php

namespace Tanks\Tanks\TanksComponents\Guns;

class HeavyGun extends Gun
{
    public function __construct(
        int $power = 30,
        int $penetration = 30,
        int $rechargeRate = 3,
        int $rechargeNominal = 0)
    {
        parent::__construct($power, $penetration, $rechargeRate, $rechargeNominal);
    }
}
