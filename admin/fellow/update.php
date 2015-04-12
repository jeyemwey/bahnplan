<?php

header('Content-Type: application/json');

include "../../inc/init.php";

$me = new User($mysqli);
if (!$me->CheckLogin(p($_SESSION['id']), p($_SESSION['hash']))) {
	die(json_encode([
		"error" => 400
	]));
}

//Log onto Twitter
Codebird::setConsumerKey($app->get("twitter.app.key"), $app->get("twitter.app.secret"));
$cb = Codebird::getInstance();
$cb->setToken($app->get("twitter.user.token"), $app->get("twitter.user.secret"));

//set up query
$sql = (string) "";

//Loop through Tweeps
$Tweeps = $mysqli->query("SELECT DISTINCT twittername FROM fellows");
while ($Tweep = $Tweeps->fetch_assoc()) {
	$Avatar = $cb->users_show("screen_name=" . $Tweep['twittername'])->profile_image_url;

	$sql .= "UPDATE fellows SET avatar_url = \"{$Avatar}\" WHERE twittername = \"{$Tweep['twittername']}\"; \n";
}

//Fire new query
if($mysqli->multi_query($sql) or die($mysqli->error))
	echo json_encode(["error" => 200, "success" => "true"]);
else
	echo json_encode(["error" => 500, "success" => "false"]);