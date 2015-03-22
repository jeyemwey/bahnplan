<?php

header('Content-Type: application/json');

include "../../inc/init.php";

$me = new User($mysqli);
if (!$me->CheckLogin(p($_SESSION['id']), p($_SESSION['hash']))) {
	die(json_encode([
		"error" => 400
	]));
}
//Build Return
$return = [];

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