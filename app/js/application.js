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
	$(".collapse").on("shown.bs.collapse", function() {
		var lat = $(this).data("lat");
		var lng = $(this).data("lng");

		console.log(lat + lng);

		$(".collapse:not(#" + $(this).attr("id") + ")").collapse("hide");


		//set Map Center
		map.setZoom(10);
			map.setCenter(new google.maps.LatLng(lat, lng));
	});

}

window.onload = initialize;