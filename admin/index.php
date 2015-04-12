<?php include "partials/header.php"; ?>
<table id="list-all">
	<tr>
		<th class="title">Ziel</th>
		<th class="dates">Daten</th>
		<th class="description">Beschreibung</th>
		<th class="action">Aktion</th>
	</tr>
	<?php
	$Query = $mysqli->query("SELECT * FROM trips");
	while ($Trip = $Query->fetch_object("Trip")): 
		?>
		<tr>
			<td class="title"><?= $Trip->Title ?></td>
			<td class="dates">
				<?php
				echo $Trip->DateStart->format("d.m.Y");
				if (!$Trip->oneDay):
					echo "&mdash;" . $Trip->DateEnd->format("d.m.Y");
				endif; //<if (!$Trip->oneDay): 
				?>
			</td>
			<td class="description">
				<?= $Parsedown->text($Trip->Description) ?>
			</td>
			<td class="action">
				<a href="edit.php?trip_id=<?= $Trip->id ?>"><i class="fa fa-pencil"></i>Bearbeiten</a><br />
				<a href="delete.php?trip_id=<?= $Trip->id ?>"><i class="fa fa-trash-o"></i>Löschen</a>
			</td>
		</tr>
		<?php
	endwhile;
	?>
</table>
<button id="update-avatars">Update Avatars</button>
<script type="text/javascript">
	$("button#update-avatars").on("click", function() {
		$(this).html("<img src=\"../app/img/ajax-load-circle.gif\" alt=\"Waiting\">");
		$.ajax({
			type: "GET",
			url: 'fellow/update.php',
			success: function(giveback) {
				$("button#update-avatars").html("Avatare updaten");
				console.log(giveback);
			}
		});			
	});
</script>
<?php include "partials/footer.php"; ?>