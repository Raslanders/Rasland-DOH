<?php

require_once ('huecontrol.php');

$control = new HueControl();
	$control->reset();
	$control->turnOff(1);
	$control->turnOff(2);
	$control->turnOff(3);

//sleep(2);

?>