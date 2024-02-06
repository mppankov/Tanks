<?php

namespace Tanks\Tanks\TanksComponents\Armor;

class MediumArmor extends Armor
{
    public function __construct(int $armor = 20)
    {
        parent::__construct($armor);
    }
}
