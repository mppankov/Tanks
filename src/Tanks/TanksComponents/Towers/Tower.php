<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\Gun;

abstract class Tower
{
    public Gun $gun;
    public int $endurance;
    public int $turningSpeed;

    public function __construct(Gun $gun, int $endurance = 10, int $turningSpeed = 10)
     {
         $this->gun = $gun;
         $this->endurance = $endurance;
         $this->turningSpeed = $turningSpeed;
     }

     public function toString(): string
     {
         return
             " -Прочность - {$this->endurance}\n -Скорость поворота - {$this->turningSpeed}\nПушка:\n{$this->gun->toString()}\n";
     }
}