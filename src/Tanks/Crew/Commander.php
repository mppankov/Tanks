<?php

namespace Tanks\Tanks\Crew;

class Commander extends Human
{
    public function __construct()
    {
        parent::__construct(Human::COMMANDER, 100, 50, 0);
    }
}
