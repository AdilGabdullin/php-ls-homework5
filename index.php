<?php
require 'Adil/Car.php';
require 'Adil/Engine.php';
require 'Adil/Niva.php';
require 'Adil/HandBrake.php';
require 'Adil/Transmission.php';
require 'Adil/TransmissionManual.php';
require 'Adil/TransmissionAuto.php';
use Adil\Niva as Niva;
use Adil\TransmissionAuto as TrAuto;

$a = new Niva();
$a->move(175, 25);

echo '<br>', PHP_EOL, 'Тест автоматической коробки', '<br>', PHP_EOL;
$t = new TrAuto();
$t->automaticallySetGear(15);
$t->automaticallySetGear(25);
