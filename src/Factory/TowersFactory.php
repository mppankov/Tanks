<?php

namespace mppankov\tanks\Factory;

use mppankov\tanks\Components\Towers\HeavyTowers;
use mppankov\tanks\Components\Towers\mediumTowers;
use mppankov\tanks\Components\Towers\LiteTowers;



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
