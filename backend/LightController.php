<?php

require_once('Database/database.php');
Class LightController {
    
    public function adjust($request) {
        $database = new Database();
        if(isset($request['id'])) {
            $values = array($request['id'], $request['id']);
            $result = $database->query('SELECT * FROM matches WHERE uid1 = ? OR uid2 = ?', $values);
            if(empty($result)) {
                //person is not in a match
            }
            else {
                $poleName = $result[0]['poleName'];
                $color = $result[0]['color'];
                $values = array($poleName, $color);
                $number = $database->query('SELECT matches FROM poles WHERE polename = ? AND color = ?', $values);
                $number = $number[0]['matches'];
                $number = $number -1;
                
                if($number <= 0) {
                    //Remove from table
                    $database->dquery('DELETE FROM poles WHERE polename = ? AND color = ?', $values);
                }
                else {
                    //reduce table
                    $values = array($number, $poleName, $color);
                    $database->nquery('UPDATE poles SET matches = ? WHERE polename = ? and color =?', $values);
                }
                //Remove match from database
                $values = array($request['id'], $request['id']);
                $database->dquery('DELETE FROM matches WHERE uid1 = ? OR uid2=?', $values);               
            }   
        }
    }
    public function getLightStatus($poleName) {
        $database = new Database();
        $values = array($poleName);
        $result = $database->query('SELECT color, matches FROM poles WHERE poleName = ?', $values);
        
        return $result;
    }
    
    
    
}


?>