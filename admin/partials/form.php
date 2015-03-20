<form method="POST">
	<table>
		<tr>
			<td class="label"><label for="title">Ziel der Reise:</label></td>
			<td colspan="2"><input type="text" name="title" id="title" value="<?= p($Title) ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="date_start">Startdatum:</label></td>
			<td colspan="2"><input type="date" name="date_start" id="date_start" value="<?php if (get_class(p($date_start, new StdClass)) == "DateTime") echo $date_start->format("Y-m-d"); ?>" /></td>
		</tr>
		<tr>
			<td class="label"><label for="date_end">Enddatum:</label></td>
			<td colspan="2"><input type="date" name="date_end" id="date_end" value="<?php if (get_class(p($date_end, new StdClass)) == "DateTime") echo $date_end->format("Y-m-d"); ?>" /></td>
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
			</script>
		</tr>
		<tr>
			<td class="label"><label for="address">Adresse für den Marker:</label></td>
			<td colspan="2"><input type="text" name="address" id="address" value="<?= p($Address->Address) ?>" /></td>
		</tr>
		<tr class="text-right">
			<td colspan="3"><input type="submit" name="submit" value="Reise einspeichern" /></td>
		</tr>
	</table>
</form>