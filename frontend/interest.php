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
		<?php $loc = 1; include("header.php"); ?>
		<div class="row">
		    <div class="large-8 small-12 columns large-centered">
		    	<div class="row margin-bottom">
		    		Great! Now that we know what flight you are on, we need you to select your category so we can match you with someone in the same group.
		    	</div>
		    	<div class="row">		
		    		<div class="small-1 column">    		
			      		<input type="radio" name="interest" value="backpack" id="backpack">
			      	</div>
		    		<div class="small-11 column"> 
		    			<div for="backpack">
		    				Backpacker
		    				<p>You intend to go backpacking or travel around in the country you are flying to.</p>
		    			</div>
		    		</div>
		    	</div>

		    	<div class="row">		
		    		<div class="small-1 columns">    		
			      		<input type="radio" name="interest" value="business" id="business">
			      	</div>
		    		<div class="small-11 columns"> 
		    			<div for="business">
		    				Business
		    				<p>You are on a business trip and are interested in meeting up with other people with the same goal.</p>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="row">
			<div class="large-10 large-centered small-12 columns">
				<a href="#" onclick="API.confirmRegistration()" class="button large radius success width-100">Confirm</a>
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