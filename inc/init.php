<?php

session_start();

//Autoload
include "classes/autoload.php";

//p function
function p(&$var, $else = '') {
	$var = (isset($var) && $var) ? $var : $else;
	return $var;
}

//load app config
$app = new Config(require "Configuration.php");

//MySQLI-Connection
$mysqli = new MySQLi($app->get("db.host"), $app->get("db.user"), $app->get("db.pass"), $app->get("db.db")) or die($mysqli->error);

//Create Parsedown instance
$Parsedown = new Parsedown();