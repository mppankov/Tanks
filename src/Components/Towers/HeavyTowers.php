<?php

namespace mppankov\tanks\Components\Towers;

use mppankov\tanks\Components\Guns\Guns;
use mppankov\tanks\Components\Guns\HeavyGuns;

class HeavyTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new HeavyGuns(), 30, 10);
    }
}
