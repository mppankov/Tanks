<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\LiteGun;

class LiteTower extends Tower
{
    public function __construct(LiteGun $gun, int $endurance = 10, int $turningSpeed = 20)
    {
        parent::__construct($gun, $endurance, $turningSpeed);
    }
}
