<?php

namespace Tanks\Game\GameUtils;

use Tanks\Tanks\Crew\Human;

trait UtilsAttack
{
    public function crewStunning(): void
    {
        foreach ($this->crew as $human)
        {
            $human->stunning();
        }
    }

    public function isStunningCrew(): bool
    {
        foreach ($this->crew as $human)
        {
            if ($human->stunning === 0) {

                return true;
            }
        }
        return false;
    }

    public function isCrewAlive(): bool
    {
        foreach ($this->crew as $human)
        {
            if ($human->health > 0) {

                return true;
            }
        }
        return false;
    }

    public function damageCrewWithoutPenetration(): void
    {
        foreach ($this->crew as $human) {

            if ($human->health > 0) {

                $human->health -= rand(0, 10);

                $human->stunning();
            }
            if($human->health <= 0){

                $human->health = 0;
            }
        }
        if ($this->isCrewAlive()) {

            $this->showTypeHumanAlive();

        } else {

            echo "Экипаж убит!\n";
        }
    }

    public function damageCrewWithPenetration(): void
    {
        foreach ($this->crew as $human) {

            if ($human->health > 0) {

                $human->health -= rand(20, 40);

                $human->stunning();
            }
            if($human->health <= 0){

                $human->health = 0;
            }
        }
        if ($this->isCrewAlive()) {

            $this->showTypeHumanAlive();

        } else {

            echo "Экипаж убит!\n";
        }
    }

    public function damageCrewWithCriticalHit(): void
    {
        foreach ($this->crew as $human) {

            if ($human->health > 0) {

                $human->health -= rand(40, 100);

                $human->stunning();
            }

            if($human->health <= 0){

                $human->health = 0;
            }
        }
        if ($this->isCrewAlive()) {

            $this->showTypeHumanAlive();

        } else {

            echo "Экипаж убит!\n";
        }
    }

    public function damageTankWithoutPenetration(): void
    {
        $rand = rand(0, 5);

        if ($this->health > 0) {

            $this->health -= $rand;

            echo "Урон: {$rand}\n";
        }
        if($this->health <= 0) {

            $this->health = 0;

            echo "Танк уничтожен!\n";

        } else {

            echo "Остаток жизней: {$this->health}\n";
        }
    }

    public function damageTankWithPenetration(int $damage): void
    {
        if ($this->health > 0) {

            $this->health -= $damage;

            echo "Урон: {$damage}\n";
        }
        if($this->health <= 0) {

            $this->health = 0;

            echo "Танк уничтожен!\n";

        } else {

            echo "Остаток жизней: {$this->health}\n";
        }
    }

    public function showTypeHumanAlive(): void
    {
        foreach ($this->crew as $human) {

            if ($human->type === Human::COMMANDER) {

                if($human->health === 0) {

                    echo "Коммандир мёртв\n";
                }

            } elseif ($human->type === Human::GUNNER) {

                if($human->health === 0) {

                    echo "Заряжающий мёртв\n";
                }

            } elseif ($human->type === Human::HELMSMAN) {

                if($human->health === 0) {

                    echo "Наводчик мёртв\n";
                }

            } elseif ($human->type === Human::MECHANICS) {

                if($human->health === 0) {

                    echo "Механник мёртв\n";
                }
            }
        }
    }

    public function randTankCriticalPenetration(): bool
    {
        return $this->tower->gun->penetration >= rand(1, 100);
    }

    public function tankShotCriticalPower(): float
    {
        return $this->tower->gun->power * 2;
    }

    public function randChanceDodge(): bool
    {
        return $this->chassis->speed >= rand(0, 100);
    }

    public function randChanceShot(): bool
    {
        return $this->tower->turningSpeed >= rand(0, 100);
    }

     public function tankRestoration(): void
     {
         $rand = rand(1, 10);

         $mechanics = $this->getCrewMember(Human::MECHANICS);

         if($rand > (100 - $this->health))

             $rand = 100 - $this->health;

         if ($this->health < 100 && $mechanics->health > 30) {

             $this->health += $rand;

             if($this->health > 100){

                 $this->health = 100;
             }
             echo "Механник восстановил {$rand} здоровья!";
         }
     }


}