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

