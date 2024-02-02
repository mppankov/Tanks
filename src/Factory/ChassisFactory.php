<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Chassis\HeavyChassis;
use Tanks\Tanks\TanksComponents\Chassis\MediumChassis;
use Tanks\Tanks\TanksComponents\Chassis\LiteChassis;



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
