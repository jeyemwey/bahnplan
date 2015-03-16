<?php include "partials/header.php"; ?>
<form method="POST" action="new.php">
	<table>
		<tr>
			<td class="label"><label for="title">Ziel der Reise:</label></td>
			<td colspan="2"><input type="text" name="title" id="title" value="<?= p($_POST['title']) ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="date_start">Startdatum:</label></td>
			<td colspan="2"><input type="date" name="date_start" id="date_start" value="<?= p($_POST['date_start']) ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="date_end">Enddatum:</label></td>
			<td colspan="2"><input type="date" name="date_end" id="date_end" value="<?= p($_POST['date_end']) ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="description">Beschreibung (<i class="fa fa-font">Markdown!</i>):</label></td>
			<td id="description-raw"><textarea name="description" id="description"></textarea></td>
			<td id="description-markdown-interpreted"></td>
		</tr>
	</table>
	<h3>Mitkommend:</h3>
	<input type="submit" value="Reise einspeichern" />
</form>