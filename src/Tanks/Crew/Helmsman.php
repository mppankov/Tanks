<?php

namespace Tanks\Tanks\Crew;

class Helmsman extends Human
{
    public function __construct()
    {
        parent::__construct(Human::HELMSMAN,100, 50, 0);
    }
}
