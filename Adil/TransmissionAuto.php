<?php

namespace Adil;

class TransmissionAuto
{
    use Transmission;

    public function automaticallySetGear(float $speed)
    {
        if ($speed < 0) {
            return false;
        }
        $this->gear = $speed <= 20 ? 1 : 2;
        echo $this, '<br>', PHP_EOL;
        return true;
    }
}
