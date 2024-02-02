<?php

namespace mppankov\tanks\Factory;

use mppankov\tanks\Components\Chassis\HeavyChassis;
use mppankov\tanks\Components\Chassis\MediumChassis;
use mppankov\tanks\Components\Chassis\LiteChassis;



class ChassisFactory
{
    public function __construct()
    {
    }

    public function creatLiteChassis(): LiteChassis
    {
        $chassis = new LiteChassis();
        return $chassis;
    }
    public function creatHeavyChassis(): HeavyChassis
    {
        $chassis = new HeavyChassis();
        return $chassis;
    }
    public function creatMediumGuns(): MediumChassis
    {
        $guns = new MediumChassis();
        return $guns;
    }
}
