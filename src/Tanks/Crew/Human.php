<?php

namespace Tanks\Tanks\Crew;

class Human
{
    public float $health;
    public float $skill;
    public float $stunning;
    public function __construct(float $health, float $skill, float $stunning)
    {
        $this->health = $health;
        $this->skill = $skill;
        $this->stunning = $stunning;
    }

    public function toString(): string
    {
        return "Здоровье - {$this->health}\nНавык - {$this->skill}\nОглушение - {$this->stunning}";
    }

    public function stunning(): void
    {
        $this->stunning = 2;
    }

    public function treatment(): void
    {
        if($this->stunning > 0){
            $this->stunning = $this->stunning - 1;
        }
    }
}
