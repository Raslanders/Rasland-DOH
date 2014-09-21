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


	//$flights never more than 3 objects
	public function addFlight($flight){
		print_r("<br />");
		print_r("<---------");
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

				print_r("<br />");
				print_r($index0);
				print_r("<br />");
				$lightIndexes = array(2, 3, 5, 6, 8, 9);
				$colors = array($index0*3+1, $index0*3+2, $index0*3+3);
				$this->flights[$index0]->setLights($lightIndexes, $colors);

				print_r("<br />");
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
			print_r("<br />");
			print_r($index1);
			print_r("<br />");
			$lightIndexes = array(1, 4, 7);
			$colors = array($index1*3+1, $index1*3+2, $index1*3+3);
			$this->flights[$index1]->setLights($lightIndexes, $colors);

			print_r("<br />");
			print_r($newIndex);
			print_r("<br />");
			$lightIndexes = array(2, 5, 8);
			$colors = array($newIndex*3+1, $newIndex*3+2, $newIndex*3+3);
			$this->flights[$newIndex]->setLights($lightIndexes, $colors);

			print_r("<br />");
			print_r($index0);
			print_r("<br />");
			$lightIndexes = array(3, 6, 9);
			$colors = array($index0*3+1, $index0*3+2, $index0*3+3);
			$this->flights[$index0]->setLights($lightIndexes, $colors);
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
			if ($this->flights[$i] === $flight)
			{
				unset($this->flights[$i]);
				$oldIndex = $i;
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
				print_r("<br />");
				print_r($index1);
				print_r("<br />");
				$lightIndexes = array(2, 3, 5, 6, 8, 9);// array_merge(flights[$index0]->getLightIndexes()
				$colors = array($index0*3+1, $index0*3+2, $index0*3+3);
				$this->flights[$index0]->setLights($lightIndexes, $colors);

				print_r("<br />");
				print_r($index0);
				print_r("<br />");
				$lightIndexes = array(1, 4, 7);
				$colors = array($index1*3+1, $index1*3+2, $index1*3+3);
				$this->flights[$index1]->setLights($lightIndexes, $colors);
		}
		if(count($this->flights) == 1){
			$lightIndexes = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
			$colors = array(1, 2, 3);
			$this->flights[$oldIndex]->setLights($lightIndexes, $colors);
		}
		if(count($this->flights) == 0){
			$this->turnOffLights();
		}
	}

	function turnOffLights()
	{

	}
}
?>