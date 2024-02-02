<?php

namespace mppankov\tanks\Components\Towers;

use mppankov\tanks\Components\Guns\LiteGuns;

class LiteTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new LiteGuns(), 15, 20  );
    }
}
