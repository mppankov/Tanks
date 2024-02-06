<?php

namespace Tanks\Tanks\Crew;

class Mechanics extends Human
{
    public function __construct()
    {
        parent::__construct(Human::MECHANICS,100, 50, 0);
    }
}