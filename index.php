<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<title>Sign Up</title>
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
				 		<a>Mapping Measurements</a>
				 	</div>
				</nav>
			</div>	
		</header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<form name="user_registration" method="post" action="includes/user.php">
						<div class="form-group">
							<label for="first-name">First Name</label>
    						<input name="first_name" type="text" class="form-control" id="first-name" placeholder="Enter First Name">
						</div>
						<div class="form-group">
							<label for="last-name">Last Name</label>
    						<input name="last_name" type="text" class="form-control" id="last-name" placeholder="Enter Last Name">
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
    						<input name="user_email" type="email" class="form-control" id="email" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
    						<input name="username" type="text" class="form-control" id="username" placeholder="Enter username">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
    						<input name="password" type="password" class="form-control" id="password" placeholder="Enter email">
						</div>
						<button name="submit_reg_btn" type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
