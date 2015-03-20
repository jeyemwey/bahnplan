<?php
//Autoload
spl_autoload_register(function ($class) {
	if (ADMIN)
		include '../inc/classes/' . $class . '.class.php';
	else
    	include 'inc/classes/' . $class . '.class.php';
});

//p function
function p(&$var, $else = '') {
	$var = (isset($var) && $var) ? $var : $else;
	return $var;
}

//MySQLI-Connection
$mysqli = new MySQLi("localhost", "root", "", "bahnplan") or die($mysqli->error);

//Create Parsedown instance
$Parsedown = new Parsedown();

//Load Page Infos
function page_information($mysqli) {
	$query = $mysqli->query("SELECT property, content FROM infos") or die($mysqli->error());
	$properties = array();
	while($row = $query->fetch_assoc()) {
		$properties[$row['property']] = $row['content'];
	}
	return $properties;
}
$page = page_information($mysqli);
