<?php
	include('includes/session.php');
	include('header.php');
		echo '<p style="float:left;">Hi <strong>'.$login_session.'!</strong></p>';
		echo '<div class="user-info">';
		echo '<div class="logout-btn"><a href="logout.php" class="btn btn-primary btn-xs">Log Out</a></div>';
		echo '</div>';

		//navigation tabs
		echo '<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a href="#">Share</a></li>
		  <li role="presentation"><a href="#">View</a></li>
		</ul>';

		//content
		$shareForm = '';
		$shareForm .= '<div class="row"><div class="col-lg-12">';
		$shareForm .='<div id="map-canvas"></div><p id="map-error"></p>';
		$shareForm .= '<input type="hidden" id="latitude"/>';
        $shareForm .= '<input type="hidden" id="longitude"/>';
		$shareForm .= '<form class="">';
		$shareForm .= '<div class="form-group">';
		$shareForm .= '<label>Discipleship Category</label><br>';
		$shareForm .= '<label class="radio-inline"><input type="radio" name="activity" value="pcs" checked>PCS</label><br>';
		$shareForm .= '<label class="radio-inline"><input type="radio" name="activity" value="church">Church</label><br>';
		$shareForm .= '<label class="radio-inline"><input type="radio" name="activity" value="training">Training</label>';
		$shareForm .= '</div>';
		$shareForm .= '<div class="form-group">';
		$shareForm .= '<label>Description</label>';
		$shareForm .= '<textarea class="form-control"></textarea>';
		$shareForm .= '</div>';
		$shareForm .= '<button name="share_btn" type="submit" class="btn btn-primary">Send</button>';
		$shareForm .= '</form>';
		$shareForm .= '</div></div>';

		echo $shareForm;

	include('footer.php');
?>