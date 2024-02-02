<?php

namespace Tanks\TanksComponents\Towers;

use Tanks\TanksComponents\Guns\Guns;
use Tanks\TanksComponents\Guns\HeavyGuns;

class HeavyTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new HeavyGuns(), 30, 10);
    }
}
