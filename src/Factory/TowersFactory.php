<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Towers\HeavyTower;
use Tanks\Tanks\TanksComponents\Towers\MediumTower;
use Tanks\Tanks\TanksComponents\Towers\LiteTower;

class TowersFactory
{
    public function __construct()
    {
    }
    public function createLiteTower(): LiteTower
    {
        $gun = new GunsFactory();
        return new LiteTower($gun->createLiteGun(), rand(13, 17), rand(18, 22));
    }
    public function createMediumTower(): MediumTower
    {
        $gun = new GunsFactory();
        return new MediumTower($gun->createMediumGun(), rand(18, 22), rand(13, 17));
    }
    public function createHeavyTower(): HeavyTower
    {
        $gun = new GunsFactory();
        return new HeavyTower($gun->createHeavyGun(), rand(28, 32), rand(8, 12));
    }
}
