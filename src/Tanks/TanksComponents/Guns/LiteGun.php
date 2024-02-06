<?php

namespace Tanks\Tanks\TanksComponents\Guns;

class LiteGun extends Gun
{
    public function __construct(int $power = 15, int $penetration = 20, int $rechargeRate = 1, int $rechargeNominal = 0)
    {
        parent::__construct($power, $penetration, $rechargeRate, $rechargeNominal);
    }
}
