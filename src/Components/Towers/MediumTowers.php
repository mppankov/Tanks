<?php

namespace mppankov\tanks\Components\Towers;

use mppankov\tanks\Components\Guns\Guns;
use mppankov\tanks\Components\Guns\MediumGuns;

class MediumTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new MediumGuns(), 10, 15);
    }
}
