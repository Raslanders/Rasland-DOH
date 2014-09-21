var map;
$('#color').css("background-color", API.d.color);

$(document).ready(function() {  
  /* Google Map
	-----------------------------------------------------*/
  google.maps.event.addDomListener(window, 'load', mapInitialize);
});

function mapInitialize() {
  var yourLatitude = 52.3101192;
  var yourLongitude = 4.7781613;

  var myOptions = {
    zoom: 15,
    center: new google.maps.LatLng(yourLatitude, yourLongitude - 0.01),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    panControl: false,
    zoomControl: false,
    scaleControl: false,
    streetViewControl: false,
    //styles: mapDark
  };

  map = new google.maps.Map(document.getElementById('google-map'), myOptions);
}

function addGateMarker(id) {  
  var geocoder = new google.maps.Geocoder();
  var address = 'Schiphol gate' + id;
  console.log(id);
  geocoder.geocode({ 'address': address }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
          addMeetingPoint(results[0].geometry.location.lat(), results[0].geometry.location.lng());
      } else {
          console.log("Request failed.")
      }
  });
}

function addMeetingPoint(lat, long) {    
  var image = {
    url: 'img/marker.png',
  };
  var myLatLng = new google.maps.LatLng(lat, long);
  var myLocation = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: "Meeting point A"
    //icon: image
  });
}
