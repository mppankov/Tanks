<?php

namespace Pr2\TheTanksGame\Objects;

class LiteTank extends Tank
{
    public function __construct()
    {
        parent::__construct(rand(11, 20), 100, rand(1, 10), rand(1, 10), rand(1, 10), 0, 1);
    }
}