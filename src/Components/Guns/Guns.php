<?php

namespace mppankov\tanks\Components\Guns;

class Guns
{
    public int $power;
    public int $penetration;

    public function __construct(int $power, int $penetration)
    {
        $this->power = $power;
        $this->penetration = $penetration;
    }

    public function toString(): string
    {
        return "Мощность: {$this->power}\nПробиваемость: {$this->penetration}\n\n";
    }
}
