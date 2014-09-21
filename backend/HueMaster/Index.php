<?php

require_once('poleflight.php');
require_once('pole.php');

$pole = new Pole();
$flight1 = new PoleFlight();
$flight2 = new PoleFlight();
$flight3 = new PoleFlight();

$flight1->setFlightNumber("HV6061");
$flight2->setFlightNumber("HV6035");
$flight3->setFlightNumber("HV6031");

$pole->init();
$pole->addFlight($flight1);
$pole->addFlight($flight2);
$pole->addFlight($flight3);

$pole->removeFlight($flight2);
$pole->removeFlight($flight1);
$pole->addFlight($flight2);
$pole->addFlight($flight3);
?>