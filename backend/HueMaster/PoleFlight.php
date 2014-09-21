<?php

class PoleFlight{

private $flightNumber;

$lightIndexes;
$colors;
	public function setLights($lightIndexes, $colors){
		$this->lightIndexes = $lightIndexes;
		$this->colors = $colors;
		print_r($lightIndexes);
		print_r("<br />");
		print_r($colors);
		print_r("<br />");
		print_r("<br />");
	}

	public function getLightIndexes(){
		return $this->lightIndexes;
	}
	public function getFlightNumber(){
		return $this->flightNumber;
	}

	public function setFlightNumber($flightNumber){
		$this->flightNumber = $flightNumber;
	}
}

?>