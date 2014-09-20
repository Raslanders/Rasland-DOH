<?php
require_once('Database/database.php');
require_once('Schiphol.php');
Class Flight {
    
    private $flightnumber;
    
    public function __construct($flightnumber) {
        $this->flightnumber = $flightnumber;
    }
    
    public function checkFlight() {   
    
        $database = new Database();
        $values = array($this->flightnumber);
        $result = $database->query("SELECT * FROM flights WHERE FlightNumber = ?", $values, PDO::FETCH_ASSOC);

        // Check if instance is already in database
        if (sizeof($result) === 0) {
            //New flight
            return getFlightInformation();
        }
        else {
            //Flight already exist
            return array('statusCode' => '200',
                         'message' => 'Flight was already added');
        }
    }
    
    private function getFlightInformation() {
        $schipholObject = new Schiphol($this->flightnumber);
        return $schipholObject->getFlightInformation();
    }
}


?>