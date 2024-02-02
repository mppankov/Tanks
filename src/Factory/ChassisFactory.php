<?php

namespace Tanks\Factory;

use Tanks\TanksComponents\Chassis\HeavyChassis;
use Tanks\TanksComponents\Chassis\MediumChassis;
use Tanks\TanksComponents\Chassis\LiteChassis;



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
