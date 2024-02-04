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
        $chassis->speed = rand(28, 32);
        return $chassis;
    }
    public function creatHeavyChassis(): HeavyChassis
    {
        $chassis = new HeavyChassis();
        $chassis->speed = rand(8, 12);
        return $chassis;
    }
    public function creatMediumChassis(): MediumChassis
    {
        $chassis = new MediumChassis();
        $chassis->speed = rand(18, 22);
        return $chassis;
    }
}
