<?php

namespace Tanks\Tanks\TanksComponents\Guns;

class HeavyGuns extends Guns
{
    public function __construct()
    {
        parent::__construct(30, 30, 3, 0);
    }
}
