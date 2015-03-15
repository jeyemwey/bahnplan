<?php
include "inc/init.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= p($page['title']); ?></title>
	<link rel="stylesheet" type="text/css" href="app/css/application.css" />
	<link rel="stylesheet" type="text/css" href="app/css/font-awesome.min.css" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300|Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<div id="sidebar">
			<div id="logo-wrapper">
				<div id="logo">
					<h1><i class="fa fa-train"></i> <?= p($page['title']); ?></h1>
				</div>
			</div>
			<ul id="trippoints" id="accordion">
				<?php
				$Query = $mysqli->query("SELECT 
					t.id AS id, 
					t.Title AS Title,
					t.Description AS Description,
					t.date_start AS date_start, 
					t.date_end AS date_end,
					t.marker_coords AS marker_coords,
					GROUP_CONCAT(DISTINCT CAST(f.id AS CHAR)) AS fellowID,
					GROUP_CONCAT(DISTINCT CAST(f.twittername AS CHAR)) AS twitternames,
					GROUP_CONCAT(DISTINCT CAST(f.avatar_url AS CHAR)) AS avatar_urls
					FROM trips t LEFT JOIN fellows f ON t.id = f.trip_id
					GROUP BY t.id");

				$Markers = [];
				while ($Trip = $Query->fetch_object("Trip")): 
					include "app/partials/trip.php";

					$Markers[$Trip->Title] = $Trip->marker_coords;
				endwhile;

				print_r($Markers);
				?>
			</ul>
			<footer><?= $Parsedown->text(p($page["footer"])); ?></footer>
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
				<?php foreach ($Markers as $Title => $Coords) : ?>
					addMarker(<?= $Coords ?>, "<?= $Title ?>");
				<?php endforeach; ?>
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