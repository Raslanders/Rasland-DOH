<?php

require_once('../Transavia/Transaviatest.php');
require_once('poleflight.php');
require_once('huecontrol.php');

class Pole{
	private $flights = [];
	private $transavia;

	public function init(){
		$this->transavia = new Transaviatest();
	}

    public function getLights(){
        $colors = [];
        foreach ($this->flights as $flight)
        {
            foreach($flight->getLightToColor() as $key => $value)
            {
                $colors[$key] = $value;
            }
        }
        sort($colors);
        
                                  print_r("<br />");
                                  print_r("KLeuren: ");
                                  print_r($colors);
                                  print_r("<br />");
        return($colors);
    }
    
    	//$flights never more than 3 objects
	public function addFlight($flight){
		print_r("<br />");
		print_r("<----ADD-----");
		print_r("<br />");
		print_r("<br />");
	for($i =0; $i<3; $i++)
	{
		if (!array_key_exists($i, ($this->flights)))
		{
			$this->flights[$i] = $flight;
			$newIndex = $i;
			break;
		}
	}

		if(count($this->flights) == 1){
			$lightIndexes = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
			$colors = array(1, 2, 3);
			$this->flights[0]->setLights($lightIndexes, $colors);
		}

		if(count($this->flights) == 2){
			$size1 = null;
			$size2= null;
			$size3= null;

			if (array_key_exists(0, ($this->flights)))
			{
				$size0 = $this->transavia->getPersonsInGroup($this->flights[0]->getFlightNumber())[1];
			}
			if (array_key_exists(1, ($this->flights)))
			{
				$size1 = $this->transavia->getPersonsInGroup($this->flights[1]->getFlightNumber())[1];
			}
			if (array_key_exists(2, ($this->flights)))
			{
				$size2 = $this->transavia->getPersonsInGroup($this->flights[2]->getFlightNumber())[1];
			}


			$index0; //largest
			$index1; //smallest
			if (is_null($size0))
			{
				if ($size1 > $size2)
				{
					$index0 = 1;
					$index1 = 2;
				}
				else
				{
					$index0 = 2;
					$index1 = 1;
				}
			} 

			if (is_null($size1))
			{
				if ($size0 > $size2)
				{
					$index0 = 0;
					$index1 = 2;
				}
				else
				{
					$index0 = 2;
					$index1 = 0;
				}
			} 

			if (is_null($size2))
			{
				if ($size0 > $size1)
				{
					$index0 = 0;
					$index1 = 1;
				}
				else
				{
					$index0 = 1;
					$index1 = 0;
				}
			} 

				print_r("<br /> ADDFlight2index0: ");
				print_r($index0);
				print_r("<br />");
				$lightIndexes = array(2, 3, 5, 6, 8, 9);
				$colors = array($index0*3+1, $index0*3+2, $index0*3+3);
				$this->flights[$index0]->setLights($lightIndexes, $colors);

				print_r("<br /> ADDFlight2.index1: ");
				print_r($index1);
				print_r("<br />");
				$lightIndexes = array(1, 4, 7);
				$colors = array($index1*3+1, $index1*3+2, $index1*3+3);
				$this->flights[$index1]->setLights($lightIndexes, $colors);

		}
		if(count($this->flights) == 3){	
			if ($newIndex != 0)
			{
				$size0 = $this->transavia->getPersonsInGroup($this->flights[0]->getFlightNumber())[1];
			}
			if ($newIndex != 1)
			{
				$size1 = $this->transavia->getPersonsInGroup($this->flights[1]->getFlightNumber())[1];
			}
			if ($newIndex != 2)
			{
				$size2 = $this->transavia->getPersonsInGroup($this->flights[2]->getFlightNumber())[1];
			}

			if ($newIndex == 0)
			{
				if ($size1 > $size2)
				{
					$index0 = 1;
					$index1 = 2;
				}
				else
				{
					$index0 = 2;
					$index1 = 1;
				}
			}
			if ($newIndex == 1)
			{
				if ($size0 > $size2)
				{
					$index0 = 0;
					$index1 = 2;
				}
				else
				{
					$index0 = 2;
					$index1 = 0;
				}
			} 

			if ($newIndex == 2)
			{
				if ($size0 > $size1)
				{
					$index0 = 0;
					$index1 = 1;
				}
				else
				{
					$index0 = 1;
					$index1 = 0;
				}
			} 
            
            print_r("<br />ADDFligt3index1: ");
			print_r($index1);
			print_r("<br />");
			$lightIndexes1 = $this->flights[$index1]->getLightIndexes();//smallest one keeps its values
			$colors = array($index1*3+1, $index1*3+2, $index1*3+3);
			$this->flights[$index1]->setLights($lightIndexes1, $colors);

            print_r("<br />ADDFlight3index0:");
			print_r($index0);
			print_r("<br />");
            			$lightIndexes2 = $this->flights[$index0]->getLightIndexes();//largest one loses one of its values
            if (in_array("1",$lightIndexes2))
            {
			 $lightIndexes2 = array(1, 4, 7);
            }
            else if (in_array("2",$lightIndexes2))
            {
            $lightIndexes2 = array(2, 5, 8);
            }
            else if (in_array("2",$lightIndexes2))
            {
            $lightIndexes2 = array(2, 6, 9);
            }
			$colors = array($index0*3+1, $index0*3+2, $index0*3+3);
			$this->flights[$index0]->setLights($lightIndexes2, $colors);
            
            
            print_r("<br />ADDFlight3newIndex:s");
			print_r($newIndex);
			print_r("<br />");
			$lightIndexes = array_diff(array(1,2,3,4,5,6,7,8,9),array_merge($lightIndexes1,$lightIndexes2));
			$colors = array($newIndex*3+1, $newIndex*3+2, $newIndex*3+3);
			$this->flights[$newIndex]->setLights($lightIndexes, $colors);
            




		}
	}

	public function removeFlight($flight)
	{
				print_r("<br />");
		print_r("<---------");
		print_r("<br />");
		print_r("<br />");
		for($i =0; $i<3; $i++)
		{
			if ($this->flights[$i] == $flight)
			{
                $oldIndex = $i;
                $previousLights = $this->flights[$i]->getLightIndexes();
				unset($this->flights[$i]);
				break;
			}
		}
		if(count($this->flights) == 2)
		{
			if ($oldIndex != 0)
			{
				$size0 = $this->transavia->getPersonsInGroup($this->flights[0]->getFlightNumber())[1];
			}
			if ($oldIndex != 1)
			{
				$size1 = $this->transavia->getPersonsInGroup($this->flights[1]->getFlightNumber())[1];
			}
			if ($oldIndex != 2)
			{
				$size2 = $this->transavia->getPersonsInGroup($this->flights[2]->getFlightNumber())[1];
			}
			if ($oldIndex == 0)
			{
				if ($size1 > $size2)
				{
					$index0 = 1;
					$index1 = 2;
				}
				else
				{
					$index0 = 2;
					$index1 = 1;
				}
			}
			if ($oldIndex == 1)
			{
				if ($size0 > $size2)
				{
					$index0 = 0;
					$index1 = 2;
				}
				else
				{
					$index0 = 2;
					$index1 = 0;
				}
			} 
			if ($oldIndex == 2)
			{
				if ($size0 > $size1)
				{
					$index0 = 0;
					$index1 = 1;
				}
				else
				{
					$index0 = 1;
					$index1 = 0;
				}
			} 
				print_r("<br />REM2index0:");
				print_r($index0);
				print_r("<br />");
				$lightIndexes = array_merge($this->flights[$index0]->getLightIndexes(),$previousLights);// a
				$colors = array($index0*3+1, $index0*3+2, $index0*3+3);
				$this->flights[$index0]->setLights($lightIndexes, $colors);

				print_r("<br />REM2index1:");
				print_r($index1);
				print_r("<br />");
				$lightIndexes = $this->flights[$index1]->getLightIndexes();
				$colors = array($index1*3+1, $index1*3+2, $index1*3+3);
				$this->flights[$index1]->setLights($lightIndexes, $colors);
		}
		if(count($this->flights) == 1){
            
            if (array_key_exists(0, ($this->flights)))
			{
                $index =0;
			}
			if (array_key_exists(1, ($this->flights)))
			{
                $index =1;
            }
			if (array_key_exists(2, ($this->flights)))
			{
				$index =2;
			}


			$lightIndexes = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
			$colors = array(1, 2, 3);
            
			$this->flights[$index]->setLights($lightIndexes, $colors);
		}
		if(count($this->flights) == 0){
			$this->turnOffLights();
		}
	}

    
    function getColor($flight,$groupNumber)
    {
        for($i =0; $i<3; $i++)
		{
			if ($this->flights[$i] == $flight)
			{
                $oldIndex = $i;
                return($light = $this->flights[$i]->getLightIndexes()[$groupNumber]);
			}
		}
    }
    
	function turnOffLights()
	{

	}
}
?>