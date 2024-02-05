<?php

namespace Tanks\Tanks;

use Tanks\Factory\ArmorFactory;
use Tanks\Factory\ChassisFactory;
use Tanks\Factory\CrewFactory;
use Tanks\Factory\TowersFactory;

class HeavyTank extends Tank
{
    public function __construct()
    {
        $crew = new CrewFactory();
        $armor = new ArmorFactory();
        $chassis = new ChassisFactory();
        $towers = new TowersFactory();

        parent::__construct($crew->creatCrew(),
            $armor->creatHeavyArmor(),
            $chassis->creatHeavyChassis(),
            $towers->creatHeavyTowers(),
            100);
    }
}