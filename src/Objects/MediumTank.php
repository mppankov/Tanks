<?php

namespace mppankov\tanks\Objects;

use mppankov\tanks\Components\Armor\MediumArmor;
use mppankov\tanks\Components\Chassis\MediumChassis;
use mppankov\tanks\Components\Towers\MediumTowers;

class MediumTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new MediumArmor(), new MediumChassis(), new MediumTowers(), 100);
    }  
}
