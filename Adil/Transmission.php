<?php

namespace Adil;

trait Transmission
{
    private $gear = 0;

    public function __toString()
    {
        switch ($this->gear) {
            case -1:
                return 'Задняя передача';
                break;
            case 0:
                return 'Нейтральная передача';
                break;
            case 1:
                return 'Первая передача';
                break;
            case 2:
                return 'Вторая передача';
                break;
            default:
                return 'Ошибка коробки передач';
        }
    }

    public function getGear()
    {
        return $this->gear;
    }

    public function neutral()
    {
        $this->gear = 0;
        echo $this, '<br>', PHP_EOL;
    }

    public function reverse()
    {
        $this->gear = -1;
        echo $this, '<br>', PHP_EOL;
    }
}
