<?php
	include('includes/connect.php');
	session_start();// Starting Session
	
	// Storing Session
	$user_check = $_SESSION['login_user'];

	// SQL Query To Fetch Complete Information Of User
	$ses_sql = mysql_query("SELECT Username FROM users WHERE Username='$user_check'");
	
	$row = mysql_fetch_assoc($ses_sql);
	
	$login_session =$row['Username'];
	
	if(!isset($login_session)) {
		mysql_close($connection); // Closing Connection
		header('Location: login.php'); // Redirecting To Login Page
	}
?>