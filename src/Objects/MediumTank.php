<?php

namespace Pr2\TheTanksGame\Objects;

class MediumTank extends Tank
{
    public function __construct()
    {
        parent::__construct(rand(21, 30), 100, rand(1, 10), rand(1, 10), rand(1, 10), 0, 2);
    }  
}
