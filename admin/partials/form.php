<form method="POST" onkeypress="return event.keyCode != 13;">
	<table>
		<tr>
			<td class="label"><label for="title">Ziel der Reise:</label></td>
			<td colspan="2"><input type="text" name="title" id="title" value="<?= p($Title) ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="checked">Status:</label></td>
			<td colspan="2">
				<input type="checkbox" name="checked" id="checked" <?= (!p($in_edit) or p($checked)) ? "checked" : "" ?>>
				<button id="unsetDates">Daten löschen</button>
			</td>
		</tr>
		<tr>
			<td class="label"><label for="date_start">Startdatum:</label></td>
			<td colspan="2"><input type="date" name="date_start" id="date_start" value="<?php echo (p($date_start) == "0000-00-00") ? "" : $date_start; ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="date_end">Enddatum:</label></td>
			<td colspan="2"><input type="date" name="date_end" id="date_end" value="<?php echo (p($date_end) == "0000-00-00") ? "" : $date_end;  ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="description">Beschreibung (<i class="fa fa-font">Markdown!</i>):</label></td>
			<td id="description-raw"><textarea name="description" id="description"><?= p($Description) ?></textarea></td>
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
			$("#unsetDates").on("click", function(e) {
				$("#date_start").val("");
				$("#date_end").val("");


				e.preventDefault();
			});
			$(function() {
				$("#description").triggerHandler("blur");
			});
			</script>
		</tr>
		<tr>
			<td class="label"><label for="address">Adresse für den Marker:</label></td>
			<td colspan="2"><input type="text" name="address" id="address" value="<?= p($Address->Address) ?>" /></td>
		</tr>
		<?php if (p($in_edit)) include "fellow-ajax.php"; ?>
		<tr class="text-right">
			<td colspan="3"><input type="submit" name="submit" value="Reise einspeichern" /></td>
		</tr>
	</table>
</form>