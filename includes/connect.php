<?php

require ('config.php');
	
//pass the credentials from config.php to the database connection code below
//establish database connection
$connect = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die("Unable to connect to database".mysql_error());

//get credentials and connect to database
mysql_select_db(DB_NAME, $connect) or die(mysql_errno() . ": " . mysql_error() . "<br>");//select database


?>