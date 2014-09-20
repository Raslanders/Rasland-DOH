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
		<?php $loc = 3; include("header.php"); ?>
		<div class="row">
		    <div class="small-8 column small-centered">
		    	<div class="row margin-bottom">
		    		Hey! We found someone that shares the same interests at you on the same flight! You can meet him or her at:
		    	</div>
		    	<div class="row margin-bottom">		
		    		<div class="small-12 column small-centered">
						<a href="#map" class="button large radius width-100" style="background-color: #FF0000">Meeting point A, number 12</a>
						Please stand in your designated area indicated with the <span style="color: red">red</span> lights at meeting point A.
					</div>
		    	</div>		    	
		    </div>
		</div>
		<div class="row margin-bottom">
		    <div class="small-12 column small-centered"> 
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
	<script src="js/maps.js"></script>
	<script src="js/api.js"></script>
</html>