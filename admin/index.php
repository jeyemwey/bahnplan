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
<?php include "partials/footer.php"; ?>