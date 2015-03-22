<?php
include "../../inc/init.php";

//Build Return
$return = [];
header('Content-Type: application/json');

//Grab Things
$Trip = (int) p($_POST['trip_id']);
$Twittername = (string) p($_POST['twittername']);

if(empty($Trip) OR empty($Twittername)) {
	$return["error"] = 406;
} else {
	//Get Avatar
	Codebird::setConsumerKey($page["twitter_app_key"], $page["twitter_app_secret"]);
	$cb = Codebird::getInstance();
	$cb->setToken($page["twitter_my_token"], $page["twitter_my_secret"]);
	$Avatar = $cb->users_show("screen_name=" . $Twittername)->profile_image_url;
	
	//Write to DB
	$sql = "INSERT INTO fellows
			(id, trip_id, twittername, avatar_url)
		VALUES (
			NULL,
			'{$Trip}',
			'{$Twittername}',
			'{$Avatar}'
		);";
	if ($mysqli->query($sql)) {
		$return = [
			"id" => $mysqli->insert_id,
			"trip_id" => $Trip,
			"twittername" => $Twittername,
			"avatar_url" => $Avatar
		];
	} else
		$return = [
			"error" => 500
		];
}

//Give back
echo json_encode($return);