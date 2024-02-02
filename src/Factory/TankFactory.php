<?php

namespace Tanks\Factory;

use Tanks\Tanks\HeavyTank;
use Tanks\Tanks\MediumTank;
use Tanks\Tanks\LiteTank;



class TankFactory
{
    public function __construct()
    {
    }
    public function creatTanks(int $count): array
    {
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
