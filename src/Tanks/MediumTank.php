<?php

namespace Tanks\Tanks;

use Tanks\Tanks\TanksComponents\Armor\MediumArmor;
use Tanks\Tanks\TanksComponents\Chassis\MediumChassis;
use Tanks\Tanks\TanksComponents\Towers\MediumTowers;

class MediumTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new MediumArmor(), new MediumChassis(), new MediumTowers(), 100);
    }  
}
