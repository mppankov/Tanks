<?php

namespace mppankov\tanks\Components\Towers;

use mppankov\tanks\Components\Guns\Guns;
use mppankov\tanks\Components\Guns\HeavyGuns;

class Towers
{
    public Guns $guns;
    public int $endurance;
    public int $turningSpeed;

    public function __construct(Guns $guns, int $endurance, int $turningSpeed)
     {
         $this->guns = $guns;
         $this->endurance = $endurance;
         $this->turningSpeed = $turningSpeed;
     }

     public function toString(): string
     {
         return "Пушка: {$this->guns->toString()}\n
                 Прочность: {$this->endurance}\n
                 Скорость поворота: {$this->turningSpeed}\n\n";
     }
}