<html>
	<head>
		<!-- Title and meta tags -->
		<title>Flock | Rasland.nl</title>

		<!-- External css -->
    	<link rel="stylesheet" href="plugins/foundation-5.4.0/css/foundation.css" />
    	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Roboto' rel='stylesheet' type='text/css'>
		
		<!-- Internal css -->
		<link rel="stylesheet" type="text/css" href="css/default.css" />
	</head>
	<body>		
		<?php $loc = 4; include("header.php"); ?>
		<div class="row">
		    <div class="large-8 small-12 column small-centered">
		    	<p>It's a shame your match hasn't shown up :(
		    	However, we have arranged your seating so the people around you are still willing to talk.</p>
		    </div>
		</div>
		<div class="row">
		    <div class="large-8 small-12 column small-centered">		    	
		    		Your flight
		    		<h2 id="flight" class="center">HV1261</h2>
		    </div>
		</div>

		<div class="row margin-bottom">		
    		<div class="large-8 small-12 column small-centered">
				Will depart from gate
				<h2 id="gate" class="center">5</h2>
				At 
				<h2 id="time" class="center">15:06</h2>
			</div>
    	</div>	

		<div class="row margin-bottom">
			<h3 class="flight center">Have a great flight!</h2>
		</div>

		<div class="row margin-bottom">
		    <div class="large-8 small-12 column small-centered"> 
				<!-- Google Map -->
	    		<div name="map" id="google-map" style="height: 400px"></div>
    		</div>
		</div>
	</body>
	<!-- External javascript -->
	<script src="plugins/jquery-2.1.1.js"></script>
    <script src="plugins/foundation-5.4.0/js/foundation.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

	<!-- Internal javascript -->
	<script src="js/api.js"></script>
	<script src="js/maps.js"></script>
    <script src="js/flight.js"></script>	
</html>