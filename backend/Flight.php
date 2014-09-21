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
            return $this->getFlightInformation();
        }
        else {
            //Flight already exist
            return array('statusCode' => '200',
                         'message' => 'Flight was already added',
                         'gateNumber' => $result[0]['GateNumber']);
        }
    }
    
    private function getFlightInformation() {
        $schipholObject = new Schiphol($this->flightnumber);
        return $schipholObject->getFlightInformation();
    }
    
    public function getDetails($id) {
        $database = new Database();
        $values = array($id);
        $result = $database->query("SELECT * FROM flights WHERE FlightNumber IN (SELECT Flightnumber FROM persons WHERE id = ?)", $values);
        $flight = $result[0];
        return array('flightNumber' => $flight['FlightNumber'],
                     'departureTime' => $flight['DepartureTime'],
                     'gateNumber' => $flight['GateNumber']);
                                               
    }
}


?>