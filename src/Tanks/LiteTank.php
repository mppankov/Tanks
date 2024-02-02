<?php

namespace Tanks\Tanks;

use Tanks\TanksComponents\Armor\LiteArmor;
use Tanks\TanksComponents\Chassis\LiteChassis;
use Tanks\TanksComponents\Towers\LiteTowers;

class LiteTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new LiteArmor(), new LiteChassis(), new LiteTowers(), 100);
    }
}