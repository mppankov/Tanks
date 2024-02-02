<?php

namespace Tanks\TanksComponents\Chassis;

class Chassis
{
    public int $speed;

    public function __construct(int $speed)
    {
        $this->speed = $speed;
    }

    public function toString(): string
    {
        return "Скорость: {$this->speed}\n\n";
    }
}
