<?php

session_start();

require ('includes/connect.php');

	//check if post array is empty
	$post = (!empty($_POST)) ? true : false;

    //if post array is not empty execute
    if($post) {
      //create POST array to collect data from the login form

      //first confirm whether the data has been set before assigning it a variable
      //and use filter input to remove malicious characters
       if(isset($_POST['user_name'])) {
			$user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
       }
       if(isset($_POST['password'])){
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
       }
    }

    //a query for selecting login data from username table
      $query = "SELECT uid, Username, Password FROM users WHERE Username ='$user_name' AND Password = SHA('$password')";

    if ($result = mysql_query($query)) {

        //get number of rows
        $num_rows = mysql_num_rows($result);

        if($num_rows == 1) {
          echo 'true';
          //store username and ID session variables
          $_SESSION["login_user"] = $user_name;

          //fetch result from database
          $row = mysql_fetch_array($result);
          $_SESSION['uid'] = $row['uid'];
          setcookie('uid', $row['uid'], time() + (60 * 60 * 24 * 30));
        } else {
          echo 'false';
        }
    } else {
      echo "<p>No Result</p>";
    }

      //close database server connection
      mysql_close($connect);
