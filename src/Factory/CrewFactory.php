<?php

namespace Tanks\Factory;

use Tanks\Tanks\Crew\Commander;
use Tanks\Tanks\Crew\Gunner;
use Tanks\Tanks\Crew\Helmsman;
use Tanks\Tanks\Crew\Mechanics;

class CrewFactory
{
    public function __construct()
    {
    }

    public function creatCrew(): array
    {
        return array(
        "commander" => new Commander(),
        "gunner" => new Gunner(),
        "helmsman" => new Helmsman(),
        "mechanics" => new Mechanics(),);
    }
}
