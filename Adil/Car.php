<?php

namespace Adil;

abstract class Car
{
    abstract public function move(float $distance, float $speed, bool $backward);
}
