<?php

namespace Tanks\Factory;

use Tanks\TanksComponents\Armor\HeavyArmor;
use Tanks\TanksComponents\Armor\MediumArmor;
use Tanks\TanksComponents\Armor\LiteArmor;



class ArmorFactory
{
    public function __construct()
    {
    }

    public function creatLiteArmor(): LiteArmor
    {
        $armor = new LiteArmor();
        return $armor;
    }
    public function creatHeavyArmor(): HeavyArmor
    {
        $armor = new HeavyArmor();
        return $armor;
    }
    public function creatMediumArmor(): MediumArmor
    {
        $armor = new MediumArmor();
        return $armor;
    }
}

