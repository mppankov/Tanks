<?php

namespace Tanks\Factory;


use Tanks\Tanks\TanksComponents\Towers\HeavyTowers;
use Tanks\Tanks\TanksComponents\Towers\MediumTowers;
use Tanks\Tanks\TanksComponents\Towers\LiteTowers;



class TowersFactory
{
    public function __construct()
    {
    }

    public function creatLiteTowers(): LiteTowers
    {
        $towers = new LiteTowers();
        $guns = new GunsFactory();
        $towers->guns = $guns->creatLiteGuns();
        $towers->endurance = rand(13, 17);
        $towers->turningSpeed = rand(18, 22);
        return $towers;
    }
    public function creatMediumTowers(): MediumTowers
    {
        $towers = new MediumTowers();
        $guns = new GunsFactory();
        $towers->guns = $guns->creatMediumGuns();
        $towers->endurance = rand(8, 12);
        $towers->turningSpeed = rand(13, 17);
        return $towers;
    }
    public function creatHeavyTowers(): HeavyTowers
    {
        $towers = new HeavyTowers();
        $guns = new GunsFactory();
        $towers->guns = $guns->creatHeavyGuns();
        $towers->endurance = rand(28, 32);
        $towers->turningSpeed = rand(8, 12);
        return $towers;
    }
}
