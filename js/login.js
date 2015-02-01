//start of jquery code
$(document).ready(function(){
  
  //$("#login-err").css('display', 'none', 'important');
  
  //login function
  $('#login-btn').click(function() {
    var username = $('#username').val();
    var password = $('#password').val();
	
	if ((username == "")||(password =="")) {
		$("#login-err").css('display', 'block', 'important');
		$("#login-err").show(4000,function(){
			$(this).addClass("alert-danger");
			$(this).html("Please enter both user name and password");
		});
		//$("#login-err").addClass("alert-danger");
		//$("#login-err").html("Please enter both user name and password");
	} else {
	
		//var loginParameters = 'user_name=' + username + '&password=' + password;
		
		$.post("loginprocess.php",$("#user-reg-form").serialize(),
			function(data){
				alert(data);
				/*if(data=='true') {
						window.location.pathname = "measurements.php";
				} else {
					  $("#login-err").css('display', 'inline', 'important');
					  $("#login-err").addClass("alert-danger");
					  $("#login-err").html("Wrong user name or password");
				}*/
			});
			return false;
		/*$ajax({
		  type:"POST",
		  url:"loginprocess.php",
		  data: loginParameters,
		  cache:false,
		  success: function(html) {
			if(html=='true'){
			  window.location="measurements.php";
			} else {
			  $("#login-err").css('display', 'inline', 'important');
			  $("#login-err").addClass("alert-danger");
			  $("#login-err").html("Wrong user name or password");
			}
		  },
		  beforeSend:function(){
			$("#login-err").html("Loading...")
		  }
		});
		return false;*/
	}
  });
});
