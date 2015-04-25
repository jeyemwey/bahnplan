<?php
include "inc/init.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $app->get("site.name") ?></title>
	<link rel="stylesheet" type="text/css" href="app/css/application.css" />
	<link rel="stylesheet" type="text/css" href="app/css/font-awesome.min.css" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300|Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<div id="sidebar">
			<div id="logo-wrapper">
				<div id="logo">
					<h1><i class="fa fa-train"></i> <?= $app->get("site.name") ?></h1>
				</div>
			</div>
			<ul id="trippoints" class="accordion-group">
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
					FROM trips t
					INNER JOIN fellows f ON (
						t.id = f.trip_id 
						AND t.checked = 1
						AND t.date_end > now()
					)
					GROUP BY t.id
					ORDER BY t.date_start;") or die($mysqli->error);

				$Markers = [];
				$first = true;
				while ($Trip = $Query->fetch_object("TripInMain")): 
					include "app/partials/trip.php";
					$first = false;

					$Markers[$Trip->id] = array($Trip->Title, $Trip->marker_coords);
				endwhile;

				?>
			</ul>
			<footer><?= $Parsedown->text($app->get("site.footer")); ?></footer>
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

				//New Markers
				function addMarker(lat, lng, title) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(lat, lng),
						map: map,
						title: title,
    					animation: google.maps.Animation.DROP
					});
				}
				<?php foreach ($Markers as $id => $Marker) : ?>
					<?php list($Title, $Coords) = $Marker; ?>
					addMarker(<?= $Coords ?>, "<?= $Title ?>");
				<?php endforeach; ?>


				//Onclick
				$(".collapse").on("show.bs.collapse", function() {
					$(".collapse").filter(".in").collapse("hide");
				});
				$(".collapse").on("shown.bs.collapse", function() {
					var lat = $(this).data("lat");
					var lng = $(this).data("lng");

					console.log(lat + lng);

					//set Map Center
					map.setZoom(10);
  					map.setCenter(new google.maps.LatLng(lat, lng));
				});

				//Show more Tweeps
				$(".get-more").on("click", function() {
					$(this).parent().children().removeClass("hidden");
					$(this).addClass("hidden");
				});

				//Be-A-Part-Tooltip
				$("[data-toggle='tooltip']").tooltip();
			}

			window.onload = initialize;
			</script>
		</div>
	</div>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php include "inc/die.php"; ?>