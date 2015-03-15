<?php

//Autoload
spl_autoload_register(function ($class) {
    include 'inc/classes/' . $class . '.class.php';
});


//MySQLI-Connection
$mysqli = new MySQLi("localhost", "root", "", "bahnplan") or die($mysqli->error);