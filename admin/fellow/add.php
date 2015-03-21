<?php
include "../../inc/init.php";

//Build Return
$return = [];
header('Content-Type: application/json');

//Grab Things
$Trip = (int) p($_POST['trip_id'], 1);
$Twittername = (string) p($_POST['twittername'], "gltyllthsm");

//Get Avatar
Codebird::setConsumerKey($page["twitter_app_key"], $page["twitter_app_secret"]); // static, see 'Using multiple Codebird instances'
$cb = Codebird::getInstance();
$cb->setToken($page["twitter_my_token"], $page["twitter_my_secret"]);

$page["twitter_app_key"] . "\n" . $page["twitter_app_secret"] . "\n" . $page["twitter_my_token"] . "\n" . $page["twitter_my_secret"];

$guy = $cb->users_show("screen_name=" . $Twittername);

$Avatar = $guy->profile_image_url;
"\n";


if(empty($Trip) OR empty($Twittername)) {
	$return["error"] = 406;
} else {
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