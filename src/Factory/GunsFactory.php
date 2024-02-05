<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Guns\HeavyGuns;
use Tanks\Tanks\TanksComponents\Guns\LiteGuns;
use Tanks\Tanks\TanksComponents\Guns\MediumGuns;


class GunsFactory
{
    public function __construct()
    {
    }

    public function creatLiteGuns(): LiteGuns
    {
        $guns = new LiteGuns();
        $guns->power = rand(13, 17);
        $guns->penetration = rand(18, 22);
        return $guns;
    }
    public function creatHeavyGuns(): HeavyGuns
    {
        $guns = new HeavyGuns();
        $guns->power = rand(28, 32);
        $guns->penetration = rand(28, 32);
        return $guns;
    }
    public function creatMediumGuns(): MediumGuns
    {
        $guns = new MediumGuns();
        $guns->power = rand(23, 27);
        $guns->penetration = rand(23, 27);
        return $guns;
    }
}
