<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\LiteGuns;

class LiteTowers extends Towers
{
    public function __construct()
    {
        parent::__construct(new LiteGuns(), 10, 20  );
    }
}
