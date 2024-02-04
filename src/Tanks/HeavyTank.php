<?php

namespace Tanks\Tanks;

use Tanks\Factory\ArmorFactory;
use Tanks\Factory\ChassisFactory;
use Tanks\Factory\TowersFactory;
use Tanks\Tanks\TanksComponents\Armor\HeavyArmor;
use Tanks\Tanks\TanksComponents\Chassis\HeavyChassis;
use Tanks\Tanks\TanksComponents\Towers\HeavyTowers;

class HeavyTank extends Tank
{
        public function __construct()
    {
        parent::__construct(new HeavyArmor(), new HeavyChassis(), new HeavyTowers(), 100);
        $armor = new ArmorFactory();
        $chassis = new ChassisFactory();
        $towers = new TowersFactory();
        $this->armor = $armor->creatHeavyArmor();
        $this->chassis = $chassis->creatHeavyChassis();
        $this->towers = $towers->creatHeavyTowers();
    }
}