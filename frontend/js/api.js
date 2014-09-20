var API = {
  d: {
    flightNumber: null,
    goal: null,
  },

	register: function() {
		$.ajax({
          type: "POST",
          url: "../backend/index.php",
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function (msg) {
            if (msg) {
              console.log(msg);
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
              console.log("Sucess in validation!");
              window.location.replace("interest.php");
            } else {
              console.log("Fail on validation of flight");
            }
          },
          error: function(msg) {
            // Invalid flight number
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
}
