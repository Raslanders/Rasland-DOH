<?php

Class Schiphol {
    private $flightNumber;
    
    public function __construct($flightNumber) {
        $this->flightNumber = $flightNumber;
    }
    
    public function getFlightInformation() {
        $url = 'http://145.35.195.100/rest/flights';
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                ' accept' => 'application/json'
            )
        );
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        echo $response . '<br />';
    }
    
    
}