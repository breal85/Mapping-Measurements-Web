<?php
	include('includes/session.php');

	include('header.php');

		echo '<p>Welcome <strong>'.$login_session.'!</strong></p>';
		echo '<a><b class="btn btn-primary"><a href="logout.php">Log Out</a></b>';

	include('header.php');
?>