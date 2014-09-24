<?php
require_once('Database/database.php');
require_once('HueMaster/HueControl.php');
Class MatchRik {
    public function checkForMatches() {
        $database = new Database();
        $values = array();
        $personsNotMatched = $database->query("SELECT DISTINCT id FROM `persons` AS p WHERE id NOT IN (SELECT uid1 FROM matches WHERE uid1 = p.id) AND id NOT IN (SELECT uid2 FROM matches WHERE uid2 = p.id)", $values);
        $values = array();
        for($i=0; $i < sizeof($personsNotMatched); $i++) {
            array_push($values, $personsNotMatched[$i]['id']);
        }
        if(sizeof($personsNotMatched)) {
        $qMarks = str_repeat('?,', sizeof($personsNotMatched) - 1) . '?';

        $persons = $database->query("SELECT * FROM persons WHERE id IN ( ".$qMarks .")", $values, PDO::FETCH_ASSOC);
        $ignoreList = array();
        
        for($i = 0; $i < sizeof($persons); $i++) {
            for($j=0; $j < sizeof($persons); $j++) {
                if($i != $j) {
                    if(!in_array($i, $ignoreList) && !in_array($j, $ignoreList)) {
                        if($persons[$i]['Goal'] == $persons[$j]['Goal'] && $persons[$i]['Flightnumber'] == $persons[$j]['Flightnumber']) {
                            array_push($ignoreList, $i);
                            array_push($ignoreList, $j);
                            $color = $this->getColor();
                            $matchNumber = $this->getMatchNumber();
                            $values = array($persons[$i]['id'], $persons[$j]['id'], $color, "A", $matchNumber);
                            $database->nquery("INSERT INTO matches (uid1, uid2, color, poleName, matchNumber) VALUES (?, ?, ?, ?, ?)", $values);
                            
                            //Increase number of matches at pole with color 
                            $values = array("A", $color);
                            $results = $database->query("SELECT * FROM poles WHERE polename = ? AND color = ?", $values, PDO::FETCH_ASSOC);
                            if(empty($results)) {
                                //Does not already exist in database
                                $values = array("A", $color, 1);
                                $database->nquery("INSERT INTO poles (polename, color, matches) VALUES (?, ?, ?)", $values);
                            }
                            else {
                                //Does already exist in database
                                $values = array($results[0]['matches']+1, "A", $color);
                                $database->nquery("UPDATE poles SET matches = ? WHERE polename = ? AND color = ?", $values);
                            }
                        }
                    }
                }
            }
        }
    
        }
    }
    
    private function getColor() {
        $database = new Database();
        $randomNumber = rand(0, 2);
        $colors = array(0 => 'green',
                         1 => 'orange',
                         2 => 'blue', 
                         /*3 => 'orange',
                         4 => 'yellow',
                         5 => 'purple'*/);
        //$this->changeColor($colors[$randomNumber]);
        return $colors[$randomNumber];       
        
    }
    
    private function getMatchNumber() {
        $database = new Database();
        return rand(1,999);
        
    }
    
    private function changeColor( $colorname ) {
        $command;
        switch ( $colorname )
        {
            case "green":
            $command = 26000;
            break;

            case "orange":
            $command = 9100;
            break;

            case "blue":
            $command = 45000;
            break;

            /*case "orange":
            $command = 9100;
            break;

            case "yellow":
            $command = 18000;
            break;
            case "purple":
            $command = 52000;
            break;*/
        }
        try {
        $control = new HueControl();
        $control->turnOn(1);
        $control->turnOn(2);
        $control->turnOn(3);
        $control->setColor(1, 26000);
        $control->setColor(2, 0);
        $control->setColor(3, 45000);
        }
        catch (Exception $e) {
            
        }
        return $colorname;
    }

    
    
}

$mr = new MatchRik();
$mr->checkForMatches();
?>