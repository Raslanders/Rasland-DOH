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
           data: {
           		action: 'register',
           		flightNumber: number,
           		goal: goal
           }
       });

	}
}