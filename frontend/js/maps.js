$(document).ready(function() {
  var map;

  /* Google Map
	-----------------------------------------------------*/

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
  
    addMeetingPoint(52.3097519,4.7645703);
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

  google.maps.event.addDomListener(window, 'load', mapInitialize);
});