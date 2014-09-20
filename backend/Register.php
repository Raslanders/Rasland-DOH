require_once('database');
<?php
Class Register {
    private $request
    function __construct($request) {
        $this->request = $request;
    }
    
    public function process() {
        //Put the new user in the database
        $database = new database()->getDBN();
        if(isset($request['flightnumber']) && isset($request['goal'])) {
            //Arguments are correct
            $values = array($request['goal'], $request['flightnumber']);
            $database->nquery("INSERT INTO persons (Goal, Flightnumber) VALUES (?, ?)", $values);
            
            //Get flight information
            $flightObject = new Flight($request['flightnumber']);
            $flightObject->checkFlight();            
        }
        else {
            //Arguments are incorrect
        }
            return(array('statusCode' => '400', 'message' => 'Arguments are invalid'));
    }
}
    



?>