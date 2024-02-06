<?php

namespace Tanks\Tanks\TanksComponents\Chassis;

class HeavyChassis extends Chassis
{
    public function __construct(int $speed = 10)
    {
        parent::__construct($speed);
    }
}
