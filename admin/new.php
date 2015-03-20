<?php

define("ADMIN", true);
include "../inc/init.php";

if(isset($_POST["submit"])) {

	$Title = mysql_real_escape_string(htmlentities($_POST["title"]));
	$date_start = new DateTime($_POST["date_start"]);
	$date_end = new DateTime($_POST["date_end"]);
	$Description = mysql_real_escape_string(htmlentities($_POST["description"], ENT_NOQUOTES));
	$Address = new Address(htmlentities($_POST["address"]));

	echo $sql = "INSERT INTO trips (id, Title, date_start, date_end, marker_address, marker_coords, Description) VALUES (NULL,
		'{$Title}',
		'{$date_start->format("Y-m-d H:i:s")}',
		'{$date_end->format("Y-m-d H:i:s")}',
		'{$Address->Address}',
		'{$Address->Lat}, {$Address->Lng}',
		'{$Description}');";

	if($mysqli->query($sql)) 
		header("Location: edit.php?id=" . $mysqli->insert_id);
}

$feonly = true;
include "partials/header.php";
?>
<h2>Neue Reise</h2>

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
			<script type="text/javascript">
			$("#description").on("blur", function() {
				var request = {
					text: $(this).val()
				};
				$.ajax({
					type: "POST",
					url: 'md.php',
					data: request,
					success: function(md) {
						console.log(md.text);
						$("#description-markdown-interpreted").html(md.text);
					}
				});
			});
			</script>
		</tr>
		<tr>
			<td class="label"><label for="address">Adresse für den Marker:</label></td>
			<td colspan="2"><input type="text" name="address" id="address" value="<?= p($_POST['address']) ?>" /></td>
		</tr>
		<tr class="text-right">
			<td colspan="3"><input type="submit" name="submit" value="Reise einspeichern" /></td>
		</tr>
	</table>
</form>
<?php include "partials/footer.php";