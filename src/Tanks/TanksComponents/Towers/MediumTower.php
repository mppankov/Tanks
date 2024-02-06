<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\MediumGun;

class MediumTower extends Tower
{
    public function __construct(MediumGun $gun, int $endurance = 30, int $turningSpeed = 10)
    {
        parent::__construct($gun, $endurance, $turningSpeed);
    }
}
