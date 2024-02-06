<?php

namespace Tanks\Tanks\TanksComponents\Chassis;

class MediumChassis extends Chassis
{
    public function __construct(int $speed = 20)
    {
        parent::__construct($speed);
    }
}
