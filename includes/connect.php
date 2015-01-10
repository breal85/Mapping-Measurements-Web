<?php
//**database constants**
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD","");
define("DB_NAME","mapping_measurements");

//pass the credentials from config.php to the database connection code below
//establish database connection
$connect = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die("Unable to connect to database".mysql_error());

//get credentials and connect to database
mysql_select_db(DB_NAME, $connect) or die(mysql_errno() . ": " . mysql_error() . "<br>");//select database

//establish database connection
//$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


?>