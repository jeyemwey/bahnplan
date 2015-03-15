<?php
include "inc/init.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Janniks Bahnplan</title>
	<link rel="stylesheet" type="text/css" href="app/css/application.css" />
	<link rel="stylesheet" type="text/css" href="app/css/font-awesome.min.css" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300|Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<div id="sidebar">
			<div id="logo-wrapper">
				<div id="logo">
					<h1><i class="fa fa-train"></i> Janniks Bahnplan</h1>
				</div>
			</div>
			<ul id="trippoints" id="accordion">
				<?php
				$Query = $mysqli->query("SELECT * FROM trips");
				while ($Trip = $Query->fetch_object("Trip")): 
					include "app/partials/trip.php";
				endwhile;
				?>
			</ul>
		</div>
		<div id="map_canvas">
			<script type="text/javascript">
			function initialize() {
				centerP = new google.maps.LatLng(51.165691, 10.451526);
				var mapOptions = {
					zoom: 7,
					center: centerP,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

				function addMarker(lat, lng, title) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(lat, lng),
						map: map,
						title: title,
    					animation: google.maps.Animation.DROP
					});
				}
				addMarker(52.5093520, 13.3757390, "Berlin");
				addMarker(53.5537365, 9.9927808, "Hamburg");
			}

			window.onload = initialize;
			</script>
		</div>
	</div>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php include "inc/die.php"; ?>