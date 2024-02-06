<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\HeavyGun;

class HeavyTower extends Tower
{
    public function __construct(HeavyGun $gun, int $endurance = 30, int $turningSpeed = 10)
    {
        parent::__construct($gun, $endurance, $turningSpeed);
    }
}
