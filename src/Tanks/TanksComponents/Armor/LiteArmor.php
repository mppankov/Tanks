<?php

namespace Tanks\Tanks\TanksComponents\Armor;

class LiteArmor extends Armor
{
    public function __construct(int $armor = 10)
    {
        parent::__construct($armor);
    }
}