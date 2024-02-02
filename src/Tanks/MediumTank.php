<?php

namespace Tanks\Tanks;

use Tanks\TanksComponents\Armor\MediumArmor;
use Tanks\TanksComponents\Chassis\MediumChassis;
use Tanks\TanksComponents\Towers\MediumTowers;

class MediumTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new MediumArmor(), new MediumChassis(), new MediumTowers(), 100);
    }  
}
