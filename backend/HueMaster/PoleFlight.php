<?php
require_once ('huecontrol.php');

class PoleFlight{

private $flightNumber;
private $control;
    
private $lightIndexes;
private $colors;
    
private $lightToColor;
    function __construct()
    {
        
    $this->lightToColor=[];
     //$this->control = new HueControl();
     //$this->control->reset();

    }
    
	public function setLights($lightIndexes, $colors){

		$this->lightIndexes = $lightIndexes;
		$this->colors = $colors;
        $totalLights = count($this->lightIndexes);
        for($i = 0; $i<$totalLights;$i++)
        { 
            $numberOfStepsTheSame = ($totalLights)/(3);
            $colorIndex = floor(($i)/$numberOfStepsTheSame);
            $lightColor[$i] = $colors[$colorIndex];
        }
        echo "colors\r\n";
        print_r($lightIndexes);
        print_r($lightColor);
        $this->lightToColor = [];
        $i = 0;
        sort($lightIndexes);
        foreach($lightIndexes as $light)
        {
            $this->lightToColor[$light] = $lightColor[$i];
            $i++;
        }
        print_r($this->lightToColor);
        echo "endColors\r\n";
	}

	public function getLightIndexes(){
		return $this->lightIndexes;
	}
	public function getFlightNumber(){
		return $this->flightNumber;
	}

    public function getlightToColor(){
        return($this->lightToColor);
    }
    
	public function setFlightNumber($flightNumber){
		$this->flightNumber = $flightNumber;
	}
}

?>