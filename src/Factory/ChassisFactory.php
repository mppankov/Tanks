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

    public function createLiteChassis(): LiteChassis
    {
        return new LiteChassis(rand(28, 32));
    }
    public function createHeavyChassis(): HeavyChassis
    {
        return new HeavyChassis(rand(8, 12));
    }
    public function createMediumChassis(): MediumChassis
    {
        return new MediumChassis(rand(18, 22));
    }
}
