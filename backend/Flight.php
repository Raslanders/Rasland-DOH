<?php

Class Flight {
    
    private $flightnumber;
    
    public function __construct($flightnumber) {
        $this->flightnumber = $flightnumber;
    }
    
    public function checkFlight() {   
    
        $database = new Database()->getDBN();
        $values
        $result = $this->db->query("SELECT * FROM flights WHERE FlightNumber = ?", $values);

        // Check if instance is already in database
        if (sizeof($result) === 0) {
            //New flight
            getFlightInformation();
        }
        else {
            //Flight already exist
            
        }
    }
    
    private function getFlightInformation() {
        
    }
}


?>