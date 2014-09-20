<?php
require_once('Database/database.php');
Class Checkin {
    private $request;
    function __construct($request) {
        $this->request = $request;
    }
    
    public function process() {
        $database = new Database();
        if(isset($this->request['id'])) {
                $values = array($this->request['id']);
                $result = $database->query("SELECT * FROM persons WHERE id= ?", $values, PDO::FETCH_ASSOC);

            // Check if id is in database
            if (sizeof($result) === 0) {
                //Person is not in database
                return array('statusCode' => '400',
                             'message' => 'id was not found in the database');

            } else {
                //Person is in database
                $values = array($this->request['id']);
                $database->nquery("UPDATE persons SET CheckedIn = 1 WHERE id = ?", $values);
                return array('statuscode' => '200',
                             'message' => 'Checked in correctly');    
            } 
        }
        else {
            return array('statusCode' => '400',
                         'message' => 'unique id was not provided');
        }
    }    
}
?>