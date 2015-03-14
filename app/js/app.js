function initialize() {

	var xmlHttp = null;
    var theUrl = "http://maps.google.com/maps/api/geocode/json?address=" + 'Deutschland' + "&sensor=false";
    xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", theUrl, false);
    xmlHttp.send(null);
    var lat = (JSON.parse(xmlHttp.responseText).results[0].geometry.location.lat);
    var lng = (JSON.parse(xmlHttp.responseText).results[0].geometry.location.lng);

	var mapOptions = {
		zoom: 7,
		center: new google.maps.LatLng(lat, lng),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
}

function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize";
	document.body.appendChild(script);
}

window.onload = loadScript;