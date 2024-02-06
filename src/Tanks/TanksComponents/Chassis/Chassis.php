<?php

namespace Tanks\Tanks\TanksComponents\Chassis;

abstract class Chassis
{
    public int $speed;

    public function __construct(int $speed = 10)
    {
        $this->speed = $speed;
    }

    public function toString(): string
    {
        return "Скорость - {$this->speed}";
    }
}
