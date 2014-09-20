<?php

$request = json_decode(html_entity_decode($_POST['request']), true);
$response = -1;
if(isset($request['action'])) {
    $action = $request['action'];
    if($action === 'register') {
        $registerObject = new Register($request);
        $response = $registerObject->process();
    }
    if($action === 'checkin') {
        $requestObject = new Checkin($request);
        $response = $requestObject->process();
    }
}
if($response != -1) {
    http_response_code($response['statusCode']);
}
echo json_encode($response);
//$matchingObject = new Matcher();

?>