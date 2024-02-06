<?php

namespace Tanks\Tanks\TanksComponents\Chassis;

class LiteChassis extends Chassis
{
    public function __construct(int $speed = 30)
    {
        parent::__construct($speed);
    }
}
