<?php

namespace User\Tanks\Factory;

use User\Tanks\Objects\HeavyTank;
use User\Tanks\Objects\MediumTank;
use User\Tanks\Objects\LiteTank;



class TankFactory
{
    public function __construct()
    {
    }
    public function creatTanks(int $count): array
    {
        if ($count < 1 || $count > 10)
        {
            var_dump("Колличество танков должно быть от 1 до 10!");
            return [];
        }

        $tanks = [];

        for ($i = 0; $i < $count; $i++)  
        {
        $random = rand(0, 90);
            
            if ($random < 30) {
                $tanks[] = new HeavyTank();
            } elseif ($random < 60) {
                $tanks[] = new MediumTank();
            } else {
                $tanks[] = new LiteTank();   
            }  
        }
         return $tanks;
    } 
}
