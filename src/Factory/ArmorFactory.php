<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Armor\LiteArmor;
use Tanks\Tanks\TanksComponents\Armor\MediumArmor;
use Tanks\Tanks\TanksComponents\Armor\HeavyArmor;

class ArmorFactory
{
    public function __construct()
    {
    }

    public function createLiteArmor(): LiteArmor
    {
        return new LiteArmor(rand(8, 12));
    }
    public function createMediumArmor(): MediumArmor
    {
        return new MediumArmor(rand(18, 22));
    }
    public function createHeavyArmor(): HeavyArmor
    {
        return new HeavyArmor(rand(28, 32));
    }
}

