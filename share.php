<?php
	include('includes/session.php');
	 // If the session vars aren't set, try to set them with a cookie
    if (!isset($_SESSION['uid'])) 
    {
        if (isset($_COOKIE['uid'])) {
            $_SESSION['uid'] = $_COOKIE['uid'];
        }
    }

    $sessionUser = $_SESSION['uid'];

	//Fetching Values from URL
	// $lat=$_POST['lat'];
	// $long=$_POST['long'];
	// $desc=$_POST['desc'];
	// $activity=$_POST['activity'];

	//check if post array is empty
    $post = (!empty($_POST)) ? true : false;

    //if post array is not empty execute  
    if($post) {
		if(isset($_POST['lat'])) {
	        $lat = filter_input(INPUT_POST, 'lat', FILTER_SANITIZE_STRING);
	    }
		if(isset($_POST['long'])){
		    $long = filter_input(INPUT_POST, 'long', FILTER_SANITIZE_STRING);
		}
		if(isset($_POST['desc'])){
		    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
		}
		if(isset($_POST['activity'])){
		    $activity = filter_input(INPUT_POST, 'activity', FILTER_SANITIZE_STRING);
		}
	}
	
	//Insert query
	$query = "INSERT INTO ministry_info(Latitude, Longitude, users_uid, category_cid, Description) VALUES ('$lat', '$long','$sessionUser','$activity','$desc')";

	$result = mysql_query($query) or die ($query."<br/><br/>".mysql_error());//query the database by inserting the values

	if (!$result) {
		echo "Try again!";
	} else {
		echo "Form Submitted Succesfully";
	}
	
	mysql_close($connect); // Connection Closed