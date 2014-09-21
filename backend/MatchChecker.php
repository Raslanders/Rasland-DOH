<?php
require_once('Database/database.php');
Class MatchChecker {
    private $request;
    
    function __construct($request) {
        $this->request = $request;
    }
    
    public function check() {
        if(!isset($this->request['id'])) {
            return array('statusCode' => '400',
                         'message' => 'An id is required to send');
        }
        $database = new Database();
        $values = array($this->request['id']);
        $result = $database->query("SELECT * FROM persons WHERE id= ?", $values, PDO::FETCH_ASSOC);

        // Check if id is in database
        if (sizeof($result) === 0) {
            //Person is not in database
            return array('statusCode' => '400',
                             'message' => 'id was not found in the database');
        } else {
            //Person is in database, now check if there is a match
            $values = array($this->request['id'], $this->request['id']);
            $result = $database->query("SELECT * FROM matches WHERE uid1= ? OR uid2 = ?", $values, PDO::FETCH_ASSOC);
            if (sizeof($result) === 1) {
                return array('statusCode' => '200',
                             'message' => 'You are clustered',
                             'color' => $result['color'],
                             'poleName' => $result['poleName'],
                             'matchNumber' => $result['matchNumber']);
            }
            else {
                return array('statusCode' => '400',
                             'message' => 'You are not clustered yet');
            }
        } 
    }
}