<?php
require_once('Register.php');
$arguments = array('flightnumber' => 'HV611', 'goal' => 1);
$registerObject = new Register($arguments);
$registerObject->process();
?>