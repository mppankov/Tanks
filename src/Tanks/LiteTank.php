<?php

namespace Tanks\Tanks;

use Tanks\Tanks\TanksComponents\Armor\LiteArmor;
use Tanks\Tanks\TanksComponents\Chassis\LiteChassis;
use Tanks\Tanks\TanksComponents\Towers\LiteTowers;

class LiteTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new LiteArmor(), new LiteChassis(), new LiteTowers(), 100);
    }
}