<tr>
	<td class="label top">Mitfahrer: </td>
	<td colspan="2">
		<?php
		$fellows = $mysqli->query("SELECT * FROM fellows WHERE trip_id = " . $id) or die($mysqli->error);
		if ($fellows->num_rows):
			echo "<ul id=\"fellows\">";
			while ($fellow = $fellows->fetch_assoc()) {
				?>
				<li class="fellow clearfix" data-id="<?= $fellow["id"] ?>">
					<div class="left-wrapper">
						<img class="name" src="<?= $fellow["avatar_url"] ?>" />
						<span class="name"><?= $fellow["twittername"] ?></span>
					</div>
					<div class="button-wrapper">
						<button class="delete">&times;</button>
					</div>
				</li>
				<?php
			}
			echo "</ul>";

		else:
			?>
			<strong>Es f&auml;hrt noch niemand mit :(</strong>
			<?php
		endif;
		?>
	</td>
</tr>