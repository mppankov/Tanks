<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Guns\HeavyGun;
use Tanks\Tanks\TanksComponents\Guns\LiteGun;
use Tanks\Tanks\TanksComponents\Guns\MediumGun;


class GunsFactory
{
    public function __construct()
    {
    }

    public function createLiteGun(): LiteGun
    {
        return new LiteGun(rand(13, 17), rand(18, 22));
    }
    public function createHeavyGun(): HeavyGun
    {
        return new HeavyGun( rand(28, 32), rand(28, 32));
    }
    public function createMediumGun(): MediumGun
    {
        return new MediumGun( rand(23, 27), rand(23, 27));
    }
}
