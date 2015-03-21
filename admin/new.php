<?php

include "../inc/init.php";

if(isset($_POST["submit"])) {

	$Title = mysql_real_escape_string(htmlentities($_POST["title"]));
	$date_start = new DateTime($_POST["date_start"]);
	$date_end = new DateTime($_POST["date_end"]);
	$Description = mysql_real_escape_string(htmlentities($_POST["description"], ENT_NOQUOTES));
	$Address = new Address(htmlentities($_POST["address"]));
	$Address->getLatLng();

	echo $sql = "INSERT INTO trips (id, Title, date_start, date_end, marker_address, marker_coords, Description) VALUES (NULL,
		'{$Title}',
		'{$date_start->format("Y-m-d H:i:s")}',
		'{$date_end->format("Y-m-d H:i:s")}',
		'{$Address->Address}',
		'{$Address->Lat}, {$Address->Lng}',
		'{$Description}');";

	if($mysqli->query($sql)) 
		header("Location: edit.php?id=" . $mysqli->insert_id);
	else echo "Irgendwas ist schiefgelaufen.";
}

$feonly = true;
include "partials/header.php";
?>
<h2>Neue Reise</h2>

<?php include "partials/form.php"; include "partials/footer.php";