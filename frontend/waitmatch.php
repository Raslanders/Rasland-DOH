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
		<?php $loc = 3; include("header.php"); ?>
		<!-- Start Match -->
		<div class="row margin-bottom">
		    <div class="large-12 small-12 columns">
				<h1 class="center">Searching for match...</h1>
			</div>
		</div>
		<!-- End Match -->
		<!-- Start Pillar -->
		<div class="row">
			<div class="large-8 small-12 columns small-centered">
			    <div class="spinner"></div>
			</div>
		</div>
	</body>
	<!-- External javascript -->
	<script src="plugins/jquery-2.1.1.js"></script>
    <script src="plugins/foundation-5.4.0/js/foundation.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

	<!-- Internal javascript -->
	<script src="js/maps.js"></script>
	<script src="js/api.js"></script>
	<script>
		var iv = setInterval(API.isMatched, 1000);
	</script>
</html>
	