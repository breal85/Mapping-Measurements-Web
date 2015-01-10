<?php
	include('includes/session.php');

	 // If the session vars aren't set, try to set them with a cookie
    if (!isset($_SESSION['uid'])) 
    {
        if (isset($_COOKIE['uid'])) {
            $_SESSION['uid'] = $_COOKIE['uid'];
        }
    }
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
		
		$shareForm = '';
		$shareForm .= '<div class="row"><div class="col-lg-12">';
		$shareForm .='<div id="map-canvas"></div><p id="map-error"></p>';
		$shareForm .= '<div id="message-box"></div>';
		$shareForm .= '<input type="hidden" id="latitude" name="latitude"/>';
        $shareForm .= '<input type="hidden" id="longitude" name="longitude"/>';
		$shareForm .= '<form id="share-form" method="POST">';
		$shareForm .= '<div class="form-group">';
		$shareForm .= '<label>Discipleship Category</label><br>';
		$shareForm .= '<label class="radio-inline"><input type="radio" name="activity" value="1" checked>PCS</label><br>';
		$shareForm .= '<label class="radio-inline"><input type="radio" name="activity" value="2">Church</label><br>';
		$shareForm .= '<label class="radio-inline"><input type="radio" name="activity" value="3">Training</label>';
		$shareForm .= '</div>';
		$shareForm .= '<div class="form-group">';
		$shareForm .= '<label>Description</label>';
		$shareForm .= '<textarea name="description" class="form-control" id="description"></textarea>';
		$shareForm .= '</div>';
		$shareForm .= '<input id="share-btn" name="share-btn" type="submit" class="btn btn-primary" value="Submit">';
		$shareForm .= '</form>';
		$shareForm .= '</div></div>';

		echo $shareForm;
		echo '</div>';

	include('footer.php');
?>