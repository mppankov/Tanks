<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\MediumGuns;

class MediumTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new MediumGuns(), 20, 15);
    }
}
