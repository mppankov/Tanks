<?php

namespace Tanks\Factory;

use Tanks\Tanks\Crew\Human;

class CrewFactory
{
    public function __construct()
    {
    }

    public function createCrew(): array
    {
        return  [
            new Human(Human::COMMANDER, 100, 50, 0),
            new Human(Human::GUNNER, 100, 50, 0),
            new Human(Human::HELMSMAN, 100, 50, 0),
            new Human(Human::MECHANICS, 100, 50, 0)];
    }
}
