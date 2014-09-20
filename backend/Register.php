<?php
require_once('Database/database.php');
require_once('Flight.php');
Class Register {
    private $request;
    
    function __construct($request) {
        $this->request = $request;
    }
    
    public function process() {
        //Put the new user in the database
        $database = new database();
        if(isset($this->request['flightnumber']) && isset($this->request['goal'])) {
            $uniqueId = uniqid();
            print($uniqueId);
            //Arguments are correct
            $values = array($uniqueId, $this->request['goal'], $this->request['flightnumber']);
            $database->nquery("INSERT INTO persons (id, Goal, Flightnumber) VALUES (?, ?, ?)", $values);
            
            //Get flight information
            $flightObject = new Flight($this->request['flightnumber']);
            $returnStatus = $flightObject->checkFlight();
            if($returnStatus['statuscode']== 200) {
                $returnStatus['id'] = $uniqueId;
            }
        }
        else {
            //Arguments are incorrect
        }
            return(array('statusCode' => '400', 'message' => 'Arguments are invalid'));
    }
}
    



?>