<?php
require_once('Database/database.php');
Class Schiphol {
    private $flightNumber;
    
    public function __construct($flightNumber) {
        $this->flightNumber = $flightNumber;
    }
    
    public function getFlightInformation() {
        $url = 'http://145.35.195.100/rest/flights/D/' . $this->flightNumber;
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Accept:application/json" 
            )
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $json = json_decode($response, true);
        if(empty($json['Flights'])) {
            //Fight does not exist or does not depart from Schiphol
            return array('statusCode' => '404',
                         'message' => 'Flight does not exist');
        }
        else {
            $flights = $json['Flights']['Flight'];
            $database = new Database();
            $values = array($flights['FlightNumber'], $flights['ScheduleTime'], $flights['Gate']);
            $result = $database->nquery("INSERT INTO flights (FlightNumber, DepartureTime, GateNumber) VALUES (?, ?, ?)", $values);
            return array('statusCode' => '200',
                         'message' => 'Flight was added to the database');
        }       
    }
    
    public function validate() {
        $url = 'http://145.35.195.100/rest/flights/D/' . $this->flightNumber;
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Accept:application/json" 
            )
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        $json = json_decode($response, true);
        if(empty($json['Flights'])) {
            //Fight does not exist or does not depart from Schiphol
            return array('statusCode' => '404',
                         'message' => 'Flight does not exist');
        }
        else {
            //Flight is valid
            return array('statusCode' => '200',
                         'message' => 'Flight is valid');
        } 
    }
    
    
}