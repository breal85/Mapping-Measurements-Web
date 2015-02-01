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