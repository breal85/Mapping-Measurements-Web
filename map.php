<?php
	include('includes/session.php');

	include('header.php');

	echo '<p>Welcome <strong>'.$login_session.'!</strong></p>';
	echo '<a><b class="btn btn-primary"><a href="logout.php">Log Out</a></b>';

	echo '<a href="share.php" class="btn btn-success">Share</a>';
	echo '<a href="view.php" class="btn btn-success">View</a>';

	include('footer.php');
?>