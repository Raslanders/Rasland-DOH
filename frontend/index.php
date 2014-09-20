<html>
	<head>
		<!-- Title and meta tags -->
		<title>Flock | Rasland.nl</title>

		<!-- External css -->
    	<link rel="stylesheet" href="plugins/foundation-5.4.0/css/foundation.css" />
    	<link href="http://fonts.googleapis.com/css?family=Arvo%7CRoboto:400,300,700" rel="stylesheet" type="text/css">

		<!-- Internal css -->
		<link rel="stylesheet" type="text/css" href="css/default.css" />
	</head>
	<body>
		
		<?php $loc = 0; include("header.php"); ?>

		<div class="row">
			<div class="large-8 small-12 columns small-centered">
				<p>Hey there! Thanks for using Flock, we will make your flight more interesting and allow you to meet new people. </p>

				<p>Starting off, we need to know your flight number. Please fill it in below.</p>
				<form>
					<div class="row">
					    <div class="large-12 columns">
					      	<label>
					        	<input type="text" id="flightNumber" placeholder="Enter your flight number here" />
					      	</label>
					    </div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="large-8 small-12 columns small-centered">
				<div class="large-6 small-6 columns left">
					<a href="#" class="button radius cancel left">I don't want to flock</a>
				</div>
				<div class="large-6 small-6 columns right">
					<a href="#" onclick="API.confirmFlightNumber();" class="button radius confirm right">Continue</a>
				</div>
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