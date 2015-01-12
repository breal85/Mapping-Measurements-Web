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
	echo '<div id="view">';

	 //a query for selecting data from ministry info table
    $query = "SELECT ministry_info.mid, ministry_info.Description,category.CategoryName, ministry_info.Latitude, ministry_info.Longitude,users.First_Name, users.Last_Name FROM ministry_info, users, category WHERE ministry_info.category_cid = category.cid AND ministry_info.users_uid = users.uid";

    //store query in a variable
    $result = mysql_query($query);

    if(!$result) {
    	echo '<p>No Results!</p>';
    } else {
    	while($row = mysql_fetch_assoc($result)) {

    		$userFname = $row['First_Name'];
    		$userLname = $row['Last_Name'];
    		$catMinistry =  $row['CategoryName'];
    		$infoId =  $row['mid'];

    		echo '<div class="list-group">
			  <a href="list-item.php?mid='.$infoId.'" class="list-group-item">
			    <h4 class="list-group-item-heading">'.$catMinistry.'</h4>
			    <p class="list-group-item-text">'.$userFname.' '.$userLname.'</p>
			  </a>
			</div>';
    	}
    }
	echo '</div>';
	include('footer.php');