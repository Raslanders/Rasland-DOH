<?php
require_once('Register.php');
require_once('Checkin.php');
require_once('Schiphol.php');
require_once('MatchChecker.php');
require_once('MatchRik.php');
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
        $matchChecker = new MatchChecker($request);
        $response = $matchChecker->check();
    }
}
if($response != -1) {
    http_response_code($response['statusCode']);
}
echo json_encode($response);
$matchingObject = new MatchRik();
$matchingObject->checkForMatches();

?>