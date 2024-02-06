<?php

namespace Tanks\Factory;

use Tanks\Tanks\HeavyTank;
use Tanks\Tanks\LiteTank;
use Tanks\Tanks\MediumTank;
use Tanks\Tanks\Tank;

class TankFactory
{
    public function __construct()
    {
    }

    public function createTanks(int $count): array
    {
        $tanks = [];
        $random = rand(0, 90);

        $crew = new CrewFactory();
        $armor = new ArmorFactory();
        $chassis = new ChassisFactory();
        $tower = new TowersFactory();

        for ($i = 0; $i < $count; $i++)  
        {
            if ($random < 30) {

                $tanks[] = new HeavyTank(
                    $crew->createCrew(),
                    $armor->createHeavyArmor(),
                    $chassis->createHeavyChassis(),
                    $tower->createHeavyTower(),
                    100);

            } elseif ($random < 60) {

                $tanks[] = new MediumTank(
                    $crew->createCrew(),
                    $armor->createMediumArmor(),
                    $chassis->createMediumChassis(),
                    $tower->createMediumTower(),
                    100);

            } else {

                $tanks[] = new LiteTank(
                    $crew->createCrew(),
                    $armor->createLiteArmor(),
                    $chassis->createLiteChassis(),
                    $tower->createLiteTower(),
                    100);
            }  
        }
         return $tanks;
    } 
}
