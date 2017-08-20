<?php

namespace Adil;

class Engine
{
    private $power;
    private $temperature;
    private $maxSpeed;

    public function __construct(float $power, float $temperature)
    {
        $this->power = $power;
        $this->temperature = $temperature;
        $this->maxSpeed = $power * 2;
        echo 'Двигатель. Мощность - ', $this->power, 'л.с., ',
        't=', $this->temperature, '°, Максимальная скорость - ',
        $this->maxSpeed, 'м/с<br>', PHP_EOL;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    public function ignition()
    {
        echo 'Зажигание двигателя', '<br>', PHP_EOL;
    }

    public function shutoff()
    {
        echo 'Выключение двигателя', '<br>', PHP_EOL;
    }

    public function increaseTemperature(float $rise)
    {
        $this->temperature += $rise;
        echo 't=', $this->temperature, '°', '<br>', PHP_EOL;
        while ($this->temperature >= 90) {
            $this->temperature -= 10;
            echo 'Включение вентилятора t=', $this->temperature, '°',
            '<br>', PHP_EOL;
        }
    }
}
