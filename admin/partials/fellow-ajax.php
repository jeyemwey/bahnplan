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
						<img src="<?= $fellow["avatar_url"] ?>" />
						<span class="name"><?= $fellow["twittername"] ?></span>
					</div>
					<div class="button-wrapper">
						<a class="delete" data-id="<?= $fellow["id"] ?>">&times;</a>
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
		<div id="new-fellow">
			<input type="text" name="twittername" id="twittername" /><button type="button" id="new-fellow-button">Anlegen</button>
		</div>
		<script type="text/javascript">
			$("a.delete").on("click", function() {
				var id = $(this).data("id");
				var request = {
					id: id
				};
				$.ajax({
					type: "POST",
					url: 'fellow/delete.php',
					data: request,
					success: function(jsonstring) {
						console.log(jsonstring);
						$("li[data-id='" + id + "']").hide();
					}
				});
			});

			$("button#new-fellow-button").on("click", function() {
				var request = {
					trip_id: <?= $id ?>,
					twittername: $("#twittername").val()
				};
				$.ajax({
					type: "POST",
					url: 'fellow/add.php',
					data: request,
					success: function(giveback) {
						console.log(giveback);
						$("ul#fellows").append("<li class=\"fellow clearfix\" data-id=\"" + giveback.id + "\"><div class=\"left-wrapper\">" +
							"<img class=\"name\" src=\"" + giveback.avatar_url + "\" />" +
							"<span class=\"name\">" + giveback.twittername + "</span>" +
						"</div>" +
						"<div class=\"button-wrapper\">" +
							"<a class=\"delete\" data-id=\" + giveback.id + \">&times;</a>" +
						"</div></li>");

						$("#twittername").removeAttr('value');
					}
				});
				console.log(request);
			});
		</script>
	</td>
</tr>