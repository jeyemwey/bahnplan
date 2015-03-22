<?php

include "../inc/init.php";

$feonly = true;
include "partials/header.php";
?>
<form action="POST" id="login">
	<h2>Einloggen</h2>
	<div class="field">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" autofocus />
	</div>
	<div class="field">
		<label for="password">Passwort:</label>
		<input type="password" name="password" id="password" />
	</div>
	<div class="clearfix field text-right">
		<input type="submit" name="submit" id="submit" value="Einloggen" />
	</div>
</form>
<?php include "../inc/die.php";