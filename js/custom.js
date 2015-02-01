//custom js file

//Login page redirection
function login() {
	window.location.href = "login.php";
}

//Sign up page redirection
function signup() {
	window.location.href = "signup.php";
}


//Map Javascript Functions

//geolocation function for creating map options
function geolocationSuccess(position) {
    //map positions
    var lat = position.coords.latitude;
    var long = position.coords.longitude;

    //output latitude and longitude into hidden text fields
   	//sendLatLong(lat, long);

    //get center coordinates
    var userLatLng = new google.maps.LatLng(lat, long);

    //Map Options
    var myOptions = {
        zoom : 16,
        center : userLatLng,
        mapTypeId : google.maps.MapTypeId.ROADMAP
    };

    // Draw the map
    mapObject = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

    // Create the marker for the user's position
    var uMarker = new google.maps.Marker({
        position: userLatLng,
        title: 'Your Current Location',
        map: mapObject
    });

    uMarker.setMap(mapObject);
}

//output latitude and longitude into hidden text fields
function sendLatLong(lat,long){
    //document.getElementById("latitude").value = lat;
    //document.getElementById("longitude").value = long;
}

//error for geolocation
function geolocationError(positionError) {
    document.getElementById("map-error").innerHTML += "Error: " + positionError.message + "<br />";
}

//get the user's current position
function geolocateUser() {
    // If the browser supports the Geolocation API
    if (navigator.geolocation) {
        var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
        };
        //geolocation API to get current location of the user
        navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
    } else {
    	document.getElementById("map-error").innerHTML += "Your browser doesn't support the Geolocation API";
    }
}
//window.onload = geolocateUser;

//start of jquery code
$(document).ready(function(){

	//do not display message box
	$("#message-box").css('display', 'none', 'important');

	//save map data
	$("#share-btn").click(function(){
		var latitude = $("#latitude").val();
		var longitude = $("#longitude").val();
		var description = $("#description").val();
		var activity = $("input[name=activity]:checked").val();

		// Returns successful data submission message when the entered information is stored in database.

		var dataString = 'lat='+ latitude + '&long='+ longitude + '&desc='+ description + '&activity='+ activity;

		if(description==''||activity=='') {
			alert("Please Fill All Fields");
		}

		else {
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "share.php",
				data: dataString,
				cache: false,
				success: function(result){

						$("#message-box").css('display', 'inline', 'important');
						$("#message-box").html('<p class="alert alert-success">Information saved successfully</p>');
				},
				error: function() {
						$("#message-box").css('display', 'inline', 'important');
						$("#message-box").html('<p class="alert alert-danger">There was a problem saving the information! Try again!</p>');
				}
			});
		}
		return false;
	});
	
	  //$("#login-err").css('display', 'none', 'important');
  
  //log in function
  $('#login-btn').click(function(e) {
    var username = $('#username').val();
    var password = $('#password').val();
	
	if ((username == "")||(password == "")) {
		$("#login-err").css('display', 'block', 'important');
		$("#login-err").addClass("alert-danger");
		$("#login-err").html("Please enter both user name and password");
		$('#username').val("");
		$('#password').val("");
		e.preventDefault();
		
	} else {
		//var loginParameters = 'user_name=' + username + '&password=' + password;
		$.post("loginprocess.php",$("#user-reg-form").serialize(),
			function(data){
				if(data=='true') {
					window.location = "measurements.php";
				} else {
					$("#login-err").css('display', 'block', 'important');
					$("#login-err").addClass("alert-danger");
					$("#login-err").html("Wrong user name or password");
					$('#username').val("");
					$('#password').val("");
				}
			});
		e.preventDefault();
	}
  });
});
