<?php

include "../inc/init.php";

$me = new User($mysqli);
if (!$me->CheckLogin(p($_SESSION['id']), p($_SESSION['hash']))) {
	header("Location: login.php");
}

$id = (int) p($_GET["trip_id"]);

if(isset($_POST["submit"])) {
	$Title = $mysqli->real_escape_string(htmlentities($_POST["title"]));
	$checked = (!empty(p($_POST['checked']))) ? "true" : "false";

	$date_start = new DateTime($_POST["date_start"]);
	$date_end = new DateTime($_POST["date_end"]);
	$Description = $mysqli->real_escape_string(htmlentities($_POST["description"], ENT_NOQUOTES));
	$Address = new Address(htmlentities($_POST["address"]));
	$Address->getLatLng();

	$sql = "UPDATE trips SET
		Title = '{$Title}',
		checked = {$checked},
		date_start = '{$date_start->format("Y-m-d H:i:s")}',
		date_end = '{$date_end->format("Y-m-d H:i:s")}',
		marker_address = '{$Address->Address}',
		marker_coords = '{$Address->Lat}, {$Address->Lng}',
		Description = '{$Description}'

		WHERE id = {$id};";

	if ($date_start < $date_end) {
		if($mysqli->query($sql)) 
			$message = "&Auml;nderung gespeichert!";
		else
			$message = "Irgendwas ist schiefgelaufen.";
	} else {
		$message = "Das Enddatum ist vor dem Startdatum >.<";
	}
}

if(isset($_GET["trip_id"]) AND ((int) $_GET["trip_id"]) != 0) {
	$Query = $mysqli->query("SELECT * FROM trips WHERE id = {$id}");

	$Trip = $Query->fetch_assoc();

	$Title = $Trip["Title"];
	$checked = $Trip["checked"];
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

<?php $in_edit = true; include "partials/form.php" ?>
<?php include "partials/footer.php";