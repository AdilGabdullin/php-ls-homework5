<?php

namespace Adil;

class TransmissionManual
{
    use Transmission;

    public function first()
    {
        $this->gear = 1;
        echo $this, '<br>', PHP_EOL;
    }

    public function second()
    {
        $this->gear = 2;
        echo $this, '<br>', PHP_EOL;
    }
}
