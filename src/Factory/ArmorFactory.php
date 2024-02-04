<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Armor\HeavyArmor;
use Tanks\Tanks\TanksComponents\Armor\LiteArmor;
use Tanks\Tanks\TanksComponents\Armor\MediumArmor;


class ArmorFactory
{
    public function __construct()
    {
    }

    public function creatLiteArmor(): LiteArmor
    {
        $armor = new LiteArmor();
        $armor->armor = rand(8, 12);
        return $armor;
    }
    public function creatHeavyArmor(): HeavyArmor
    {
        $armor = new HeavyArmor();
        $armor->armor = rand(28, 32);
        return $armor;
    }
    public function creatMediumArmor(): MediumArmor
    {
        $armor = new MediumArmor();
        $armor->armor = rand(18, 22);
        return $armor;
    }
}

