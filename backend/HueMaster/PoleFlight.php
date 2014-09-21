<?php
require_once ('huecontrol.php');

class PoleFlight{

private $flightNumber;
private $control;
    
private $lightIndexes;
private $colors;
    
    function __construct()
    {
     $this->control = new HueControl();
     //$this->control->reset();

    }
    
	public function setLights($lightIndexes, $colors){

		$this->lightIndexes = $lightIndexes;
		$this->colors = $colors;
        $totalLights = count($this->lightIndexes);
        for($i = 1; $i<=$totalLights;$i++)
        { 

        $numberOfStepsTheSame = $totalLights/(3);
        
            
        if($i <=3)
            {
            $this->control->turnOn($i);
            print_r($colorIndex);

            $this->control->setColor($i,$colors[$colorIndex]);
                print_r("<br />");
                print_r($colors);
                print_r($colors[$colorIndex]);
                print_r("<br />");
            }
        }
        print_r("<--- />");
//		print_r($lightIndexes);
//		print_r("<br />");
//		print_r($colors);
//		print_r("<br />");
//		print_r("<br />");
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