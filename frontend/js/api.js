var API = {
  d: {
    flightNumber: null,
    goal: null,
    uid: null,
  },

	register: function() {
		$.ajax({
          type: "POST",
          url: "../backend/index.php",
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function (msg) {
            if (msg) {
              console.log("Registration succesfull!");
              API.saveData(API.d.uid, msg.uid); // TODO - zoiets? 
              window.location.replace("checkin.php");
            } else {
            	console.log("Fail on register");
            }
          },
          error: function(msg) {
            console.log(msg);
          },
          data: 
            "request=" + escape(JSON.stringify(
            {
              action: 'register',
              flightNumber: API.d.flightNumber, // HV611
              goal: API.d.goal
            })) 
    });
	},

  validateFlight: function() {
    $.ajax({
          type: "POST",
          url: "../backend/index.php",
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function (msg) {
            if (msg) {
              API.saveFlightNumber();
              console.log("Validation succesfull!");
              window.location.replace("interest.php");
            } else {
              console.log("Fail on validation of flight");
            }
          },
          error: function(msg) {
            // IHV1261nvalid flight number
            console.log("Validation failed");
            document.getElementById("flightNumber").className += " error";
          },
          data: 
            "request=" + escape(JSON.stringify(
            {
              action: 'validateFlight',
              flightNumber: document.getElementById("flightNumber").value,
            })) 
    });
  },

  checkIn: function() {
    $.ajax({
          type: "POST",
          url: "../backend/index.php",
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function (msg) {
            if (msg) {
              console.log("Check in succesfull!");
              window.location.replace("match.php");
            } else {
              console.log("Fail on check in");
            }
          },
          error: function(msg) {
            console.log("Check in failed");
            document.getElementById("flightNumber").className += " error";
          },
          data: 
            "request=" + escape(JSON.stringify(
            {
              action: 'checkIn',
              uid: API.d.uid,
            })) 
    });
  },

  confirmRegistration: function() {
    API.saveData(API.d.goal, 0);
    API.register();
  },

  confirmFlightNumber: function() {
    API.validateFlight();
  },

  saveFlightNumber: function() {
    API.saveData(API.d.flightNumber, document.getElementById("flightNumber").value);
  },

  saveData: function(obj, value) {
    obj = value;
    localStorage.setItem("flockData", API.d);      
  },

  loadData: function() {
    console.log("Loading data..");
    if (localStorage.getItem("flockData")) {
      API.d = localStorage.getItem("flockData"); 
      console.log(API.d);
    }   
  },
}

API.loadData();