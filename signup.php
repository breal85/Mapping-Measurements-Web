<?php include('header.php');?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<h3>Registration</h3>
				<form name="user_registration" method="post" action="user.php" class="user-reg">
					<div class="form-group">
						<label for="first-name">First Name</label>
						<input name="first_name" type="text" class="form-control" id="first-name" placeholder="">
					</div>
					<div class="form-group">
						<label for="last-name">Last Name</label>
						<input name="last_name" type="text" class="form-control" id="last-name" placeholder="">
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input name="user_email" type="email" class="form-control" id="email" placeholder="">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input name="username" type="text" class="form-control" id="username" placeholder="">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input name="password" type="password" class="form-control" id="password" placeholder="">
					</div>
					<button name="submit_reg_btn" type="submit" class="btn btn-primary reg-btn">Submit</button>
				</form>
			</div>
		</div>
	</div>
<?php include('footer.php');?>