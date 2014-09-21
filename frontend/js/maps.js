
var map;
var lat; 
var long;
document.getElementById('poleName').innerHTML = API.d.poleName;
    document.getElementById('matchNumber').innerHTML = API.d.matchNumber;
    $('#color').css("background-color", API.d.color);

$(document).ready(function() {  
  /* Google Map
	-----------------------------------------------------*/
var geocoder = new google.maps.Geocoder();
var address = 'Schiphol gate' + API.d.gateNumber;
geocoder.geocode({ 'address': address }, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        lat = results[0].geometry.location.lat();
        long = results[0].geometry.location.lng();
    } else {
        console.log("Request failed.")
    }
});

  google.maps.event.addDomListener(window, 'load', mapInitialize);
});


  function mapInitialize() {
    var yourLatitude = 52.3101192;
    var yourLongitude = 4.7681613;

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
    console.log(lat);
    addMeetingPoint(lat,long);
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