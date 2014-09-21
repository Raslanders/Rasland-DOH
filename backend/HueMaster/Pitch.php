<?php

require_once ('huecontrol.php');

$control = new HueControl();
	$control->reset();
	$control->turnOn(1);
	$control->turnOn(2);
	$control->turnOn(3);

//sleep(2);

?>