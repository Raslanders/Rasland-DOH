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
		<?php $loc = 2; include("header.php"); ?>
		<div class="row">
			<div class="large-8 small-12 column small-centered">
				<p>Welcome back, if you have arrived at Schiphol Airport, please let us know by pressing the button below! </p>
				   
			</div>
		</div>
		<div class="row">
			<div class="large-8 small-12 column small-centered">
				<a href="#" onclick="API.checkIn();" class="button large radius success width-100">Check in!</a>
			</div>
		</div>
	</body>
	<!-- External javascript -->
	<script src="plugins/jquery-2.1.1.js"></script>
    <script src="plugins/foundation-5.4.0/js/foundation.min.js"></script>

	<!-- Internal javascript -->
	<script src="js/base.js"></script>
	<script src="js/api.js"></script>
</html>