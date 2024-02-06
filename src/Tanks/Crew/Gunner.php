<?php

namespace Tanks\Tanks\Crew;

class Gunner extends Human
{
    public function __construct()
    {
        parent::__construct(Human::GUNNER, 100, 50, 0);
    }
}