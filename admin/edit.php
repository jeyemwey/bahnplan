<?php

define("ADMIN", true);
include "../inc/init.php";

$id = (int) p($_GET["trip_id"]);

if(isset($_POST["submit"])) {

	$Title = mysql_real_escape_string(htmlentities($_POST["title"]));
	$date_start = new DateTime($_POST["date_start"]);
	$date_end = new DateTime($_POST["date_end"]);
	$Description = mysql_real_escape_string(htmlentities($_POST["description"], ENT_NOQUOTES));
	$Address = new Address(htmlentities($_POST["address"]));
	$Address->getLatLng();

	$sql = "INSERT INTO trips (id, Title, date_start, date_end, marker_address, marker_coords, Description) VALUES (NULL,
		'{$Title}',
		'{$date_start->format("Y-m-d H:i:s")}',
		'{$date_end->format("Y-m-d H:i:s")}',
		'{$Address->Address}',
		'{$Address->Lat}, {$Address->Lng}',
		'{$Description}');";

	$sql = "UPDATE trips SET
		Title = '{$Title}',
		date_start = '{$date_start->format("Y-m-d H:i:s")}',
		date_end = '{$date_end->format("Y-m-d H:i:s")}',
		marker_address = '{$Address->Address}',
		marker_coords = '{$Address->Lat}, {$Address->Lng}',
		Description = '{$Description}'


		WHERE id = {$id};";

	if($mysqli->query($sql)) 
		$message = "&Auml;nderung gespeichert!";
	else
		$message = "Irgendwas ist schiefgelaufen.";
}

if(isset($_GET["trip_id"]) AND ((int) $_GET["trip_id"]) != 0) {
	$Query = $mysqli->query("SELECT * FROM trips WHERE id = {$id}");

	$Trip = $Query->fetch_assoc();

	$Title = $Trip["Title"];
	$date_start = new DateTime($Trip["date_start"]);
	$date_end = new DateTime($Trip["date_end"]);
	$Description = $Trip["Description"];
	$Address = new Address($Trip["marker_address"]);


} else  //no trip_id given
	header("Location: new.php");


$feonly = true;
include "partials/header.php";
?>
<div id="title">
	<h2><?= $Title ?></h2>
	<code>#<?= $id; ?></code>
</div>
<div id="message">
	<?= p($message) ?>
</div>

<?php include "partials/form.php" ?>
<?php include "partials/footer.php";