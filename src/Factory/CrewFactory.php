<?php

namespace Tanks\Factory;

use Tanks\Tanks\Crew\Human;

class CrewFactory
{
    public function createCrew(): array
    {
        return  [
            new Human(Human::COMMANDER, 100, rand(40, 60), 0),
            new Human(Human::GUNNER, 100, rand(40, 60), 0),
            new Human(Human::HELMSMAN, 100, rand(40, 60), 0),
            new Human(Human::MECHANICS, 100, rand(40, 60), 0)];
    }
}
