var API = {
	register: function(number, goal) {
		$.ajax({
          type: "POST",
          url: "../backend/index.php",
          dataType: "json",
          contentType: "application/x-www-form-urlencoded",
          success: function (msg) {
            if (msg) {
              console.log("successerino");
              console.log(msg);
            } else {
            	console.log("fail");
             }
          },
          error: function(msg) {
            console.log(msg);
          },
          data: 
           	"request=" + escape(JSON.stringify({
                                          action: 'register',
                                          flightNumber: number, // HV611
                                          goal: goal
                                                } )) 
          }
       );

	}
}
