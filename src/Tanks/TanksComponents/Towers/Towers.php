<?php

namespace Tanks\Tanks\TanksComponents\Towers;

use Tanks\Tanks\TanksComponents\Guns\Guns;

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
         return
             "Прочность - {$this->endurance}\nСкорость поворота - {$this->turningSpeed}\n\nПушка:\n{$this->guns->toString()}\n";
     }
}