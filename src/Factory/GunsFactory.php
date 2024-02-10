<?php

namespace Tanks\Factory;

use Tanks\Tanks\TanksComponents\Guns\LiteGun;
use Tanks\Tanks\TanksComponents\Guns\MediumGun;
use Tanks\Tanks\TanksComponents\Guns\HeavyGun;

class GunsFactory
{
    public function __construct()
    {
    }

    public function createLiteGun(): LiteGun
    {
        return new LiteGun(rand(13, 17), rand(18, 22));
    }
    public function createMediumGun(): MediumGun
    {
        return new MediumGun(rand(23, 27), rand(23, 27));
    }
    public function createHeavyGun(): HeavyGun
    {
        return new HeavyGun(rand(28, 32), rand(28, 32));
    }
}
