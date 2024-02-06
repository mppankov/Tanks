<?php

namespace Tanks\Tanks\TanksComponents\Guns;

class MediumGun extends Gun
{
    public function __construct(int $power = 25, int $penetration = 35, int $rechargeRate = 2, int $rechargeNominal = 0)
    {
        parent::__construct($power, $penetration, $rechargeRate, $rechargeNominal);
    }
}
