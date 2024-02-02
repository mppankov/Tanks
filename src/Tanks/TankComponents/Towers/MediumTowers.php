<?php

namespace Tanks\TanksComponents\Towers;

use mppankov\tanks\Components\Towers\Towers;
use Tanks\TanksComponents\Guns\MediumGuns;

class MediumTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new MediumGuns(), 10, 15);
    }
}
