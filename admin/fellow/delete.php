<?php

include "../../inc/init.php";

//Build Return
$return = [];
header('Content-Type: application/json');

//Grab Things
$Fellow = (int) p($_POST['id']);

if(empty($Fellow)) {
	$return = ["error" => 406];
} else {
	$sql = "DELETE FROM fellows WHERE id = " . $Fellow;
	if ($mysqli->query($sql)) {
		$return = ["id" => $Fellow];
	} else
		$return = ["error" => 500];
}

//Give back
echo json_encode($return);