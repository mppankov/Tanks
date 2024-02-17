<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Chassis\LiteChassis;
use Tanks\Tanks\TanksComponents\Chassis\MediumChassis;
use Tanks\Tanks\TanksComponents\Chassis\HeavyChassis;

class ChassisFactory
{
    public function createLiteChassis(): LiteChassis
    {
        return new LiteChassis(rand(28, 32));
    }
    public function createMediumChassis(): MediumChassis
    {
        return new MediumChassis(rand(18, 22));
    }
    public function createHeavyChassis(): HeavyChassis
    {
        return new HeavyChassis(rand(8, 12));
    }
}
