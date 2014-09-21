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
		<?php $loc = 3; include("header-2.php"); ?>
		<div class="match-wrapper padding-top">
		<!-- Start Match -->
		<div class="row margin-bottom">
		    <div class="large-12 small-12 columns">
				<h1 class="center">Match found! 
		    	<img src="img/bigcheck.png" style="height: 50px" /></h1>
			</div>
		</div>
		<!-- End Match -->
		<!-- Start Pillar -->
		<div class="row">
			<div class="large-8 small-12 columns small-centered">
			    <div class="large-8 small-8 columns small-centered left">
			    	<p>We have found your match!
			    	To meet your match, walk to pillar</p>
			    </div>
			    <div class="large-2 small-4 columns small-centered right center">
			    	<h1 id="poleName">A</h1> 
				</div>
			</div>
		</div>
		<!-- End Pillar -->
		<!-- Start color info -->
		<div class="row">
		    <div class="large-8 small-12 columns small-centered">
		    	<div class="large-8 small-8 columns small-centered left">
		    	 	<p>At that pillar, go to the light with the color of this background. Your match will also be there.</p>
		    	</div>
			    <div class="large-2 small-4 columns small-centered right center">
			    	
				</div>
		    </div>
		</div> 
		<!-- End color info -->
		<!-- Start ID -->
		<div class="row">
			<div class="large-8 small-12 columns small-centered">
			    <div class="large-8 small-8 columns small-centered left">
			    	<p>You will share the following ID:</p>
			    </div>
			    <div class="large-2 small-4 columns small-centered right center">
			    	<h1 id="matchNumber">XXX</h1>        
			    </div>
			</div>
		</div>    
		<!-- End ID -->      
		<!-- Start buttons -->   
		<div class="row">
			<div class="large-8 small-12 columns small-centered">
				<div class="large-6 small-6 columns left">
					<a href="nomatch.php" id="btn-nomatch" class="button radius cancel left">I can't find my match :(</a>
				</div>
				<div class="large-6 small-6 columns right">
					<a href="flight.php"class="button radius confirm right">Found my match!</a>
				</div>
			</div>
		</div>
		<!-- End buttons -->
		<!-- Start Google Map -->	
		<div class="row margin-bottom">
		    <div class="large-8 small-12 columns small-centered"> 
	    		<div name="map" id="google-map" style="height: 400px"></div>
    		</div>
		</div>
		<!-- End Google Map -->	
		</div>
	</body>
	<!-- External javascript -->
	<script src="plugins/jquery-2.1.1.js"></script>
    <script src="plugins/foundation-5.4.0/js/foundation.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    
	<!-- Internal javascript -->
    <script src="js/api.js"></script>
    <script src="js/maps.js"></script>
    <script>
    	addMeetingPoint(52.3111192,4.7621613);
		document.getElementById('poleName').innerHTML = API.d.poleName;
		document.getElementById('matchNumber').innerHTML = API.d.matchNumber;
		API.setColor();
    </script>
</html>