<?php

namespace Tanks\Tanks;

use Tanks\Factory\ArmorFactory;
use Tanks\Factory\ChassisFactory;
use Tanks\Factory\TowersFactory;
use Tanks\Tanks\TanksComponents\Armor\LiteArmor;
use Tanks\Tanks\TanksComponents\Chassis\LiteChassis;
use Tanks\Tanks\TanksComponents\Towers\LiteTowers;

class LiteTank extends Tank
{
    public function __construct()
    {
        parent::__construct(new LiteArmor(), new LiteChassis(), new LiteTowers(), 100);
        $armor = new ArmorFactory();
        $chassis = new ChassisFactory();
        $towers = new TowersFactory();
        $this->armor = $armor->creatLiteArmor();
        $this->chassis = $chassis->creatLiteChassis();
        $this->towers = $towers->creatLiteTowers();
    }
}