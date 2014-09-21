<?php

require_once ('huecontrol.php');

$control = new HueControl();
while(true){

	$control->reset();
	$control->turnOn(1);
	$control->turnOn(2);
	$control->turnOn(3);
}



?>