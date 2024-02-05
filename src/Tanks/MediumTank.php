<?php

namespace Tanks\Tanks;

use Tanks\Factory\ArmorFactory;
use Tanks\Factory\ChassisFactory;
use Tanks\Factory\CrewFactory;
use Tanks\Factory\TowersFactory;

class MediumTank extends Tank
{
    public function __construct()
    {
        $crew = new CrewFactory();
        $armor = new ArmorFactory();
        $chassis = new ChassisFactory();
        $towers = new TowersFactory();

        parent::__construct($crew->creatCrew(),
            $armor->creatMediumArmor(),
            $chassis->creatMediumChassis(),
            $towers->creatMediumTowers(),
            100);
    }  
}
