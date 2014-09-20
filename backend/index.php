<?php

$request = json_decode(html_entity_decode($_POST['request']), true);

if(isset($request['action']))) {
    $action = $request['action'];
    if($action === 'register') {
        $registerObject = new Register($request);
        $registerObject->process();
    }
    if($action === 'checkin') {
        $requestObject = new Checkin($request);
        $requestObject->process();
    }
}
$matchingObject = new Matcher();

/**if(isset($request['action']) && isset($request['object']) && isset($request['id'])){
	$obj = $request['object'];
	$id = $request['id'];
	if(empty($obj) || empty($id)){
		NOT_FOUND();
		die;
	}
	require_once "types/$obj.php";
	$response = (new $obj($id,$db,false))->doAction($request);
	if(isset($response['statusCode'])){
		http_response_code($response['statusCode']);
	}
	echo json_encode($response);
} else {
    NOT_FOUND();
}

$request['object'] = isset($request['object'])?$request['object']:"No object preset";
$request['action'] = isset($request['action'])?$request['action']:"No action preset";
$request['action'] .= isset($request['id'])?"":" with no identifier present"; 
LOG_REQUEST($db, $request, $token);

function NOT_FOUND() { 
	http_response_code(400);
    echo '{"statusCode":"400"}';
}

function LOG_REQUEST($db, $request, $result) {
	$values = array($result['client_id'], $request['object'].":".$request['action'], $result['user_id']);
	$db->nquery("INSERT INTO log (client_id, value, user_id) VALUES (?, ?, ?)", $values); 
}

**/
?>