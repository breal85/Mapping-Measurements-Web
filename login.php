<?php include('header.php'); ?>
<div class="row">
	<div class="col-lg-12 col-xs-12">

		<!--error message container-->
		<div id="login-err" class="alert"></div>
		<div id="preloader"></div>
		<form id="user-reg-form" class="user-login" name="user_registration" method="post">
			<div class="form-group">
				<label for="user-name">User Name</label>
				<input name="user_name" type="text" class="form-control" id="username" placeholder="">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input name="password" type="password" class="form-control" id="password" placeholder="">
			</div>
			<button name="submit_login_btn" type="submit" class="btn btn-primary" id="login-btn">Login</button>
		</form>
	</div>
</div>
<?php include('footer.php');?>
