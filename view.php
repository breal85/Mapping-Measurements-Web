<?php
	include('includes/session.php');
	include('header.php');
	echo '<p style="float:left;">Hi <strong>'.$login_session.'!</strong></p>';
	echo '<div class="user-info">';
	echo '<div class="logout-btn"><a href="logout.php" class="btn btn-primary btn-xs">Log Out</a></div>';
	echo '</div>';

	//navigation tabs
	echo '<ul id="tabs" class="nav nav-tabs">
	  <li class="active"><a href="measurements.php">Share</a></li>
	  <li><a href="view.php">View</a></li>
	</ul>';

	//content - share
	echo '<div id="share">';
	echo "Can you see me?";
	include('footer.php');