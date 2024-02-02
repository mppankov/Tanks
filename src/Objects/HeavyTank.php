<?php

namespace mppankov\tanks\Objects;

use mppankov\tanks\Components\Armor\HeavyArmor;
use mppankov\tanks\Components\Chassis\HeavyChassis;
use mppankov\tanks\Components\Towers\HeavyTowers;

class HeavyTank extends Tank
{
        public function __construct()
    {
        parent::__construct(new HeavyArmor(), new HeavyChassis(), new HeavyTowers(), 100);
    }
}