<?php

include "../inc/init.php";

$error = 0;
if (isset($_POST['submit'])) {
	if (!(empty(p($_POST["username"])) OR empty(p($_POST["password"])))) {
		$Query = $mysqli->query("SELECT
			id
			FROM users
			WHERE
				username = \"" . $mysqli->real_escape_string(strtolower($_POST["username"])) . "\"
			  AND
				password = \"" . md5($_POST["password"]) . "\"") or die($mysqli->error);

		if ($Query->num_rows) {
			$User = $Query->fetch_assoc();
			$_SESSION["id"] = $User["id"];

			//Hash
			$Hash = crypt(date("Y_MhD-jifs") . md5($_POST["password"]) . date("Y_MhD-jifs"));
			$WriteQuery = $mysqli->query("UPDATE users
				SET hash = \"" . $Hash . "\"
				WHERE id = " . $User["id"]);

			$_SESSION["hash"] = $Hash;

			header("Location: index.php");

		} else {
			$error = 1;
		}
	} else {
		$error = 1;		
	}
}

$feonly = true;
include "partials/header.php";
?>
<form method="POST" id="login">
	<h2>Einloggen</h2>
	<?php if ($error): ?>
		<div class="field">
			<strong>Deine Benutzername/Passwort-Formation ist nicht existent bei uns. Versuchs nochmal.</strong>
		</div>
	<?php endif; ?>
	<div class="field">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" value="<?= p($_POST["username"]) ?>" autofocus />
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
