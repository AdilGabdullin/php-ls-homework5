<?php

namespace Adil;

class Niva extends Car
{
    public $handBrake;
    public $gearBox;
    private $engine;

    public function __construct()
    {
        echo 'Создание автомобиля Нива', '<br>', PHP_EOL;
        $this->engine = new Engine(20, 20);
        $this->gearBox = new TransmissionManual();
        $this->handBrake = new HandBrake();
    }

    public function move(float $distance, float $speed, bool $backward = false)
    {
        //Если параметры некорректные возвращаем false
        if ($distance <= 0 || $speed <= 0) {
            return false;
        }
        //Если мощности не хватает двигаемся на предельной скорости
        $maxSpeed = $this->engine->getMaxSpeed();
        if ($maxSpeed < $speed) {
            return $this->move($distance, $maxSpeed, $backward);
        }

        $this->engine->ignition();
        $this->handBrake->removeFromHandbrake();
        if ($backward) {
            //Двигаемся назад
            $this->gearBox->reverse();
            echo "Начинаем движение назад со скоростью ",
            "{$speed}м/с", '<br>', PHP_EOL;
        } else {
            //Двигемся вперед
            if ($speed <= 20) {
                $this->gearBox->first();
            } else {
                $this->gearBox->second();
            }
            echo "Начинаем движение вперед со скоростью ",
            "{$speed}м/с", '<br>', PHP_EOL;
        }
        //Каждые 10 метров двигатель нагревается на 5 градусов
        $distanceCovered = 0;
        while ($distance - $distanceCovered >= 10) {
            $distanceCovered += 10;
            echo "Проехали $distanceCovered метров. ";
            $this->engine->increaseTemperature(5);
        }
        //Если дистанция не делится на 10
        if ($distanceCovered < $distance) {
            echo "Проехали $distance метров. ";
            $this->engine->increaseTemperature(
                5 * ($distance - $distanceCovered) / 10
            );
        }
        $this->engine->shutoff();
        $this->handBrake->setTheParkingBrake();
        $this->gearBox->neutral();
        return true;
    }
}
