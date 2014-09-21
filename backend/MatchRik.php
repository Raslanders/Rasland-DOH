<?php
require_once('Database/database.php');
Class MatchRik {
    public function checkForMatches() {
        $database = new Database();
        $values = array();
        $personsNotMatched = $database->query("SELECT DISTINCT id FROM `persons` AS p WHERE id NOT IN (SELECT uid1 FROM matches WHERE uid1 = p.id) AND id NOT IN (SELECT uid2 FROM matches WHERE uid2 = p.id)", $values);
        $values = array();
        for($i=0; $i < sizeof($personsNotMatched); $i++) {
            array_push($values, $personsNotMatched[$i]['id']);
        }
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
                            $values = array($persons[$i]['id'], $persons[$j]['id'], "#FF0000", "A", 5);
                            $database->nquery("INSERT INTO matches (uid1, uid2, color, poleName, matchNumber) VALUES (?, ?, ?, ?, ?)", $values);
                        }
                    }
                }
            }
        }
    
        
    }
    
    
}
?>