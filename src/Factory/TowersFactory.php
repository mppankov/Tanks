<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Towers\HeavyTowers;
use Tanks\Tanks\TanksComponents\Towers\mediumTowers;
use Tanks\Tanks\TanksComponents\Towers\LiteTowers;



class TowersFactory
{
    public function __construct()
    {
    }

    public function creatLiteTowers(): LiteTowers
    {
        $towers = new LiteTowers();
        return $towers;
    }
    public function creatMediumTowers(): MediumTowers
    {
        $towers = new MediumTowers();
        return $towers;
    }
    public function creatHeavyTowers(): HeavyTowers
    {
        $towers = new HeavyTowers();
        return $towers;
    }
}
