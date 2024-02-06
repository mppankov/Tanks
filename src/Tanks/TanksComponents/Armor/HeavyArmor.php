<?php

namespace Tanks\Tanks\TanksComponents\Armor;

class HeavyArmor extends Armor
{
    public function __construct(int $armor = 30)
    {
        parent::__construct($armor);
    }
}