<?php

define("ADMIN", true);
include "../inc/init.php";

if(isset($_GET["trip_id"]) AND ((int) $_GET["trip_id"]) != 0) {
	
	$id = $_GET["trip_id"];

	$Query = $mysqli->query("SELECT * FROM trips WHERE id = " . $id);

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

<?php include "partials/form.php" ?>
<?php include "partials/footer.php";