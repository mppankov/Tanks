<?php

namespace Tanks\Tanks;

use Tanks\Factory\ArmorFactory;
use Tanks\Factory\ChassisFactory;
use Tanks\Factory\TowersFactory;
use Tanks\Tanks\TanksComponents\Armor\MediumArmor;
use Tanks\Tanks\TanksComponents\Chassis\MediumChassis;
use Tanks\Tanks\TanksComponents\Towers\MediumTowers;

class MediumTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new MediumArmor(), new MediumChassis(), new MediumTowers(), 100);
        $armor = new ArmorFactory();
        $chassis = new ChassisFactory();
        $towers = new TowersFactory();
        $this->armor = $armor->creatMediumArmor();
        $this->chassis = $chassis->creatMediumChassis();
        $this->towers = $towers->creatMediumTowers();
    }  
}
