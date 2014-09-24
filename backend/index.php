<?php
require_once('Register.php');
require_once('Checkin.php');
require_once('Schiphol.php');
require_once('MatchChecker.php');
require_once('MatchRik.php');
require_once('LightController.php');
$request = json_decode(html_entity_decode($_POST['request']), true);
$response = -1;
$file = 'log.txt';
$current = file_get_contents($file);
// Append a new person to the file
$current .= json_encode($request). "\r\n";
// Write the contents back to the file
file_put_contents($file, $current);
if(isset($request['action'])) {
    $action = $request['action'];
    if($action === 'register') {
        $registerObject = new Register($request);
        $response = $registerObject->process();
    } else if($action === 'validateFlight') {
        if(isset($request['flightNumber']) && !empty($request['flightNumber'])) {
            $schipholObject = new Schiphol($request['flightNumber']);
            $response = $schipholObject->validate();
        }
        else {
            $response = array('statusCode' => '400',
                              'message' => 'Flightnumber is wrong');
        }
        
    } else if($action === 'checkIn') {
        $requestObject = new Checkin($request);
        $response = $requestObject->process();
    }
    else if($action === 'isMatched') {
        $matchingObject = new MatchRik();
        $matchingObject->checkForMatches();
        $matchChecker = new MatchChecker($request);
        $response = $matchChecker->check();        
    }
    else if($action === 'getFlightDetails') {
        $flightObject = new Flight('x');
        if(isset($request['id'])) {
            $response = $flightObject->getDetails($request['id']);
            $response['statusCode'] = '200';
            $response['message'] = 'Your flight details have been succesfully found';
        }
        else {
            $response = array('statusCode' => '400',
                              'message' => 'You must send an id');
        }
        
    }
    else if($action === 'foundMatch') {
        $lightController = new LightController();
        $lightController->adjust($request);
        $response = array('statusCode' => '200',
                          'message' => 'I think this is correct');
    }
    else if($action === 'getPoleColors') {
        $lightController = new LightController();
        $response = $lightController->getLightStatus("A");
        $response['statusCode'] = '200';
    }
    else {
        $response = array('statusCode' => ' 400',
                          'message' => 'This action is invalid');
    }
}
if($response != -1) {
    http_response_code($response['statusCode']);
}
echo json_encode($response);


?>