<?php

	//require ('includes/config.php');
	require ('includes/connect.php');

	userRegistration();

	function userRegistration() {
		//check if post array is empty
      	$post = (!empty($_POST)) ? true : false;

      	//if post array is not empty execute
      	if($post) {
	        //create POST array to collect data from the user registration form
	        //confirm first whether the data has been set before assigning it a variable
	        //and use stri_tags to remove malicious characters
	         if(isset($_POST['first_name'])) {
	         	$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
	         }
	         if(isset($_POST['last_name'])){
	         	$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
	         }
	         if(isset($_POST['user_email'])){
	         	$user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
	         }
	         if(isset($_POST['username'])){
	         	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	         }
	         if(isset($_POST['password'])){
	         	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	         }
	    }

	    if (isset($_POST['submit_reg_btn'])) {
			//a query for inserting POST array data into database table
	    	$query = "INSERT INTO users (First_Name,Last_Name,Email,Username,Password) VALUES ('$first_name','$last_name', '$user_email', '$username', SHA('$password'))";

	    	$result = mysql_query($query);

	    	$num = mysql_num_rows($result);

	    	$i=0;

	    	while ($i < $num) {
	    		//CODE$i++;
	    	}

	    	if (!$result) {
				$unsucess_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/unsuccessful.php';
				header('Location: ' . $unsucess_url);
            }
            else {
				$sucess_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/success.php';
				header('Location: ' . $sucess_url);
			}

           //close database server connection
           mysql_close($connect);
    	}
	}
?>
