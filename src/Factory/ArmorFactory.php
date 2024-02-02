<?php

namespace mppankov\tanks\Factory;

use mppankov\tanks\Components\Armor\HeavyArmor;
use mppankov\tanks\Components\Armor\MediumArmor;
use mppankov\tanks\Components\Armor\LiteArmor;



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

