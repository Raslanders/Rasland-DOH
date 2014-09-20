<?php
$url = "http://transavia-doh-api.jit.su:80/api/";
$journeys = "journeys";
$bookings = "bookings";
$legs = "legs";

//print_r("Iteration 2");

//$id = "541c209d27e5bc670de4395c";
//$requestUrl =$url.$journeys."/".$id;
//print_r($requestUrl);
//$response = file_get_contents($requestUrl,false);
//print_r($response);



//CHECK IF FIRST EXISTS REQUIRED
//$id = "541c33597cc3f3f8ac706358";
$requestUrl =$url.$bookings;
$response = file_get_contents($requestUrl,false);

$arr = json_decode($response,true);

//print_r($arr);


$bookingIdArray = [];
foreach($arr as $item) { //foreach element in $arr
    array_push($bookingIdArray,$item['id']);
}



$resultingArray = [];//contains legId,bookingId

foreach($bookingIdArray as $key => $value) { //foreach element in $arr
$requestUrl =$url.$bookings."/".$value."/legs";
$response = file_get_contents($requestUrl,false);
    $arr = json_decode($response,true);
    foreach($arr as $item) { //foreach element in $arr
        $arrayToAdd = array("legId" => $item['id'],"bookingId" => $item['bookingId']);
        $resultingArray = array_merge_recursive($resultingArray,$arrayToAdd);
    }
}


        print_r($resultingArray);

//flightcode HV5497
//$fc = "HV5497";
//$requestUrl =$url.$legs."/".$fc."/legs";
//$response = file_get_contents($requestUrl,false);
//print_r($response);




?> 