document.getElementById('flight').innerHTML = API.d.flightNumber;
document.getElementById('gate').innerHTML = API.d.gateNumber;
document.getElementById('time').innerHTML = API.d.departTime;
addGateMarker(API.d.gateNumber);