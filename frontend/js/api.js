var API = {
  d: {
    flightNumber: null,
    goal: null,
    id: null,
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
              console.log(msg);
              API.saveData("id", msg.id); // TODO - zoiets? 
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
            console.log("Validation failed");
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
              window.location.replace("waitmatch.php");
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
              id: API.d.id,
            })) 
    });
  },

  isMatched: function() {
    $.ajax({
          type: "POST",
          url: "../backend/index.php",
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function (msg) {
            if (msg) {
                console.log("We got matched!");
                window.location.replace("match.php");
            } else {
                console.log("We are not matched yet!");
            }
          },
          error: function(msg) {
            console.log("Check in failed");
          },
          data: 
            "request=" + escape(JSON.stringify(
            {
              action: 'isMatched',
              id: API.d.id,
            })) 
    });
  },

  confirmRegistration: function() {
    API.saveData("goal", $('input[name="interest"]:checked').val());
    API.register();
  },

  confirmFlightNumber: function() {
    API.validateFlight();
  },

  saveFlightNumber: function() {
    API.saveData("flightNumber", document.getElementById("flightNumber").value);
  },

  saveData: function(obj, value) {
    console.log("Saving "+obj+" as: "+value);
    API.d[obj] = value;
    localStorage.setItem("flockData", JSON.stringify(API.d));      
  },

  loadData: function() {
    console.log("Loading data..");
    if (localStorage.getItem("flockData")) {
      API.d = JSON.parse(localStorage.getItem("flockData")); 
      console.log(API.d);
    }   
  },
}

API.loadData();