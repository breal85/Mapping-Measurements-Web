<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">

		<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
		<?php 
			//determine page name and add map.js only if it's measurements.php
			$pageName = basename($_SERVER['SCRIPT_NAME']);
			if ($pageName == "measurements.php") {
				echo '<script type="text/javascript" src="js/map.js"></script>';
				echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAZO7zj9pG9UQ9PGz1f7o7h4oYC2cwOKM"></script>';
			}
		?>
		<script type="text/javascript" src="js/custom.js"></script>
		<meta name="viewport" content="width=device-width">
		<title>Mapping Measurements</title>
	</head>
	<?php
		//determine page name and add geolocateUser() only if it's measurements.php
		$pageNameOnload = basename($_SERVER['SCRIPT_NAME']);
		if ($pageNameOnload == "measurements.php") {
			echo '<body onload="geolocateUser()">';
		} else {
			echo '<body>';
		}
	?>		
	<!--<body onload="geolocateUser()">-->
		<header>
			<div class="container-fluid">
				<div class="row">
					<nav>
						<div class="header-bar">
					 		<h3>Mapping Measurements</h3>
					 	</div>
					</nav>
				</div>
			</div>
		</header>

		<div class="container">