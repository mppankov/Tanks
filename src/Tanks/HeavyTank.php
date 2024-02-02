<?php

namespace Tanks\Tanks;

use Tanks\TanksComponents\Armor\HeavyArmor;
use Tanks\TanksComponents\Chassis\HeavyChassis;
use Tanks\TanksComponents\Towers\HeavyTowers;

class HeavyTank extends Tank
{
        public function __construct()
    {
        parent::__construct(new HeavyArmor(), new HeavyChassis(), new HeavyTowers(), 100);
    }
}