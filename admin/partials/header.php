<?php
if (!isset($feonly)):
	define("ADMIN", TRUE);
	include "../inc/init.php";
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= p($page['title']); ?> &mdash; Admin</title>
	<link rel="stylesheet" type="text/css" href="../app/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="../app/css/font-awesome.min.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300|Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<nav class="clearfix">
		<div id="logo-wrapper">
			<div id="logo">
				<h1><i class="fa fa-train"></i> <?= p($page['title']); ?></h1>
			</div>
		</div>		
		<ul>
			<li><a href="index.php">Alle Reisen</a></li>
			<li><a href="new.php">Neue Reise</a></li>
			<li><a href="../" target="_blank">Zur Webseite</a></li>
		</ul>	
	</nav>