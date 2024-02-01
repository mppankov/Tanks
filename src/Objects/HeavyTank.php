<?php

namespace User\Tanks\Objects;

class HeavyTank extends Tank
{
        public function __construct()
    {
        parent::__construct(rand(31, 40), 100, rand(1, 10), rand(1, 10), rand(1, 10), 0, 3);
    }
}