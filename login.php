<?php
	session_start();
	
	login();

	function login() {
		require ('includes/connect.php');

		//check if post array is empty
      	$post = (!empty($_POST)) ? true : false;

      	//if post array is not empty execute  
      	if($post) {
	        //create POST array to collect data from the login form

	        //confirm first whether the data has been set before assigning it a variable
	        //and use filter input to remove malicious characters
	         if(isset($_POST['user_name'])) {
	         	$user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
	         }
	         if(isset($_POST['password'])){
	         	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	         }
	    }

	    if (isset($_POST['submit_login_btn'])) {
			//a query for selecting login data from username table
	    	$query = "SELECT uid, Username, Password FROM users WHERE Username ='$user_name' AND Password = SHA('$password')";
	    	
	    	if ($result = mysql_query($query)) {

	    		//get number of rows
	    		$num_rows = mysql_num_rows($result);

				if($num_rows == 1) {

					//store username and ID session variables

					$_SESSION["login_user"] = $user_name;

					//fetch result from database
					$row = mysql_fetch_array($result);
					$_SESSION['uid'] = $row['uid'];
                    setcookie('uid', $row['uid'], time() + (60 * 60 * 24 * 30));

					//load login success message
					//redirect to map measurements page
					$map_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/measurements.php';
					header('Location: ' . $map_url);
				} else {
					//load login unsuccessful message
					//redirect to unsuccessful message page
					$map_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_unsuccessful.php';
					header('Location: ' . $map_url);
				}
            }
            else {
				echo "<p>No Result</p>";
			}
                       
           	//close database server connection
			mysql_close($connect);
    	}
	}
include('header.php');
?>
<div class="row">
	<div class="col-lg-12 col-xs-12">
		<form class="user-login" name="user_registration" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>">
			<div class="form-group">
				<label for="user-name">User Name</label>
				<input name="user_name" type="text" class="form-control" id="first-name" placeholder="">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input name="password" type="password" class="form-control" id="password" placeholder="">
			</div>
			<button name="submit_login_btn" type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</div>
<?php include('footer.php');?>