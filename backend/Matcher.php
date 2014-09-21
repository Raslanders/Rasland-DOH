<?php

require( 'Database/database.php' );

$match = new Matcher();

class Matcher
{
	private $db;

	public function __construct()
	{
		$emptyArray = array();
		$this->db = new Database();		
		$personIds = $this->db->query("SELECT pid, goal, flightNumber FROM persons WHERE pid NOT IN(SELECT uid1 FROM matches) AND pid NOT IN(SELECT uid2 FROM matches)", $emptyArray, PDO::FETCH_ASSOC);
		foreach ($personIds as $key => $person1) {
			foreach ($personIds as $key => $person2) {
				if($person1["pid"]!=$person2["pid"]){
					if(($person1["goal"] == $person2["goal"]) && ($person1["flightNumber"] == $person2["flightNumber"])){
						$pids = array($person1["pid"], $person1["pid"], $person2["pid"], $person2["pid"]);
						$checkDouble = $this->db->query("SELECT uid1, uid2 FROM matches WHERE uid1 = ? OR uid2 = ? OR uid1 = ? OR uid2 = ?", $pids, PDO::FETCH_ASSOC);
						if(empty($checkDouble)){
							$values = array($person1["pid"], $person2["pid"], $this->getColor($this->getPoleName()), $this->getPoleName($person1["flightNumber"]), $this->getMatchNumber());
							$this->db->nquery("INSERT INTO matches (uid1, uid2, color, poleName, matchnumber) VALUES (?, ?, ?, ?, ?)", $values);
						}						
					}
				}
			}
		}
	}

	public function getColor($poleName){
			while(true){
				$color = rand(0, 8) * 9100;
				$colorArray = array($color);
				$checkPole = $this->db->query("SELECT poleName FROM matches WHERE color = ?", $colorArray, PDO::FETCH_ASSOC);
				if($checkPole != $poleName){
					return $color;
				}
			}	
	}

	public function poleNotFull($poleName){
		$poleArray = array($poleName);
		$matchCount = $this->db->query("SELECT COUNT(matchNumber) AS Amount FROM matches WHERE poleName = ?", $poleArray, PDO::FETCH_ASSOC);
		if($matchCount < 9){
			return true;
		}else{
			return false;
		}
	}

	public function getPoleName($flightNumber){
		$notFound = true;
		while($notFound){
			$flightNumberArray = array($flightNumber);
			$poleNumber = $this->db->query("SELECT poleName FROM matches WHERE uid1 IN (SELECT pid FROM persons WHERE flightNumber = ?) OR uid2 IN (SELECT pid FROM persons WHERE flightNumber = ?)", $flightNumberArray, PDO::FETCH_ASSOC);
		}
		return 5;
	}

	public function getMatchNumber(){
		return 6;
	}

}

?>