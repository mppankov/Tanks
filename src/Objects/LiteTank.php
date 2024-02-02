<?php

namespace mppankov\tanks\Objects;

use mppankov\tanks\Components\Armor\LiteArmor;
use mppankov\tanks\Components\Chassis\LiteChassis;
use mppankov\tanks\Components\Towers\LiteTowers;

class LiteTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new LiteArmor(), new LiteChassis(), new LiteTowers(), 100);
    }
}