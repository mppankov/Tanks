<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Towers\LiteTower;
use Tanks\Tanks\TanksComponents\Towers\MediumTower;
use Tanks\Tanks\TanksComponents\Towers\HeavyTower;

class TowersFactory
{
    private GunsFactory $gunsFactory;
    public function __construct(GunsFactory $gunsFactory)
    {
        $this->gunsFactory = $gunsFactory;
    }

    public function createLiteTower(): LiteTower
    {
        return new LiteTower($this->gunsFactory->createLiteGun(), rand(13, 17), rand(18, 22));
    }
    public function createMediumTower(): MediumTower
    {
        return new MediumTower($this->gunsFactory->createMediumGun(), rand(18, 22), rand(13, 17));
    }
    public function createHeavyTower(): HeavyTower
    {
        return new HeavyTower($this->gunsFactory->createHeavyGun(), rand(28, 32), rand(8, 12));
    }
}
