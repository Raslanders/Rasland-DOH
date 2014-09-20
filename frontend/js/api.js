var API = {
	register: function(number, goal) {
		$.ajax({
           type: "POST",
           url: "../backend/index.php",
           dataType: "json",
           success: function (msg) {
               if (msg) {
                   	console.log(msg);
               } else {
               		console.log("fail");
               }
           },
           error: function(msg) {
              console.log(msg);
           },
           data: {
           		action: 'register',
           		flightNumber: number, // HV611
           		goal: goal
           }
       });

	}
}
