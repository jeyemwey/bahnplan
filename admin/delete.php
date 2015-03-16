<?php

define("ADMIN", TRUE);
include "../inc/init.php";

//Get the ID
$id = (int) $_GET['trip_id'];

$AllesGut = 1;

try {
	//Delete the trip itselt
	$sql = "DELETE FROM trips WHERE id = " . $id;
	$Query = $mysqli->query($sql);

	if (!$Query)
		throw new Exception($sql, 1);
	
	$sql = "DELETE FROM fellows WHERE trip_id = ". $id;
	$Query = $mysqli->query($sql);

	if (!$Query)
		throw new Exception($sql, 2);

} catch (Exception $e) {
	$AllesGut = 0;
	echo $Parsedown->text("Something went wrong at pos " . $e->getCode() . ". Please write an ticket at [Github](https://github.com/jeyemwey/bahnplan/issues/new). Don't forget to provide the following Code: `" . $e->getMessage() . "`");
}

if ($AllesGut)
	header("Location: index.php");