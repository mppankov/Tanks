<?php

namespace Tanks\Factory;


use Tanks\Tanks\HeavyTank;
use Tanks\Tanks\LiteTank;
use Tanks\Tanks\MediumTank;

class TankFactory
{
    private int $countTanks = 0;
    
    private CrewFactory $crewFactory;
    private ArmorFactory $armorFactory;
    private ChassisFactory $chassisFactory;
    private TowersFactory $towerFactory;
    
    
    public function __construct(

        CrewFactory $crewFactory,
        ArmorFactory $armorFactory,
        ChassisFactory $chassisFactory,
        TowersFactory $towerFactory)
    {
        $this->crewFactory = $crewFactory;
        $this->armorFactory = $armorFactory;
        $this->chassisFactory = $chassisFactory;
        $this->towerFactory = $towerFactory;
    }

    public function createTanks(int $count): array
    {
        $tanks = [];
        
        for ($i = 0; $i < $count; $i++)  
        {
            $random = rand(0, 90);

            if ($random < 30) {

                $tanks[] = new HeavyTank(
                    $this->crewFactory->createCrew(),
                    $this->armorFactory->createHeavyArmor(),
                    $this->chassisFactory->createHeavyChassis(),
                    $this->towerFactory->createHeavyTower(),
                    100);

            } elseif ($random < 60) {

                $tanks[] = new MediumTank(
                    $this->crewFactory->createCrew(),
                    $this->armorFactory->createMediumArmor(),
                    $this->chassisFactory->createMediumChassis(),
                    $this->towerFactory->createMediumTower(),
                    100);

            } else {

                $tanks[] = new LiteTank(
                    $this->crewFactory->createCrew(),
                    $this->armorFactory->createLiteArmor(),
                    $this->chassisFactory->createLiteChassis(),
                    $this->towerFactory->createLiteTower(),
                    100);
            }
            $this->countTanks++;
        }
         return $tanks;
    }

    public function getManyTanksCreated(): int
    {
        return $this->countTanks;
    }
}
