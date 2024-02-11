<?php

namespace Tanks\Tanks\Crew;

class Human
{

    const COMMANDER = "COMMANDER";
    const GUNNER = "GUNNER";
    const HELMSMAN = "HELMSMAN";
    const MECHANICS = "MECHANICS";
    public string $type;
    public int $health;
    public int $skill;
    public int $stunning;
    public function __construct(string $type, int $health, int $skill, int $stunning)
    {
        $this->type = $type;
        $this->health = $health;
        $this->skill = $skill;
        $this->stunning = $stunning;
    }

    public function toString(): string
    {
        return "Здоровье - {$this->health}\nНавык - {$this->skill}\nОглушение - {$this->stunning}\n";
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
