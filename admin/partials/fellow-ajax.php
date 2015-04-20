<tr>
	<td class="label top">Mitfahrer: </td>
	<td colspan="2">
		<?php
		$fellows = $mysqli->query("SELECT * FROM fellows WHERE trip_id = " . $id) or die($mysqli->error);
		if ($fellows->num_rows):
			echo "<ul id=\"fellows\">";
			while ($fellow = $fellows->fetch_assoc()) {
				?>
				<li class="fellow clearfix" data-id="<?= $fellow["id"] ?>" data-deleted="false">
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
			<ul id="fellows"></ul>
		<?php
		endif;
		?>
		<strong id="no-fellows-found" <?php echo (!$fellows->num_rows) ? "style=\"display: block;\"" : ""; ?>>Es f&auml;hrt noch niemand mit :(</strong>
		<div id="new-fellow">
			<input type="text" name="twittername" id="twittername" /><button type="button" id="new-fellow-button">Anlegen</button>
		</div>
		<script type="text/javascript">
			$("a.delete").on("click", function() {
				$(this).html("<img src=\"../app/img/ajax-load-circle.gif\" alt=\"Waiting\">");
				var id = $(this).data("id");
				var request = {
					id: id
				};
				$.ajax({
					type: "POST",
					url: 'fellow/delete.php',
					data: request,
					success: function(jsonstring) {
						$(this).html("&times;");
						console.log(jsonstring);
						
						$("li[data-id='" + id + "']").hide();
						$("li[data-id='" + id + "']").data("deleted", "true");

						console.log($("li[data-id='" + id + "']").data());

						console.log($("ul#fellows li.fellow:not([data-id='" + id + "'])").length);

						if($("ul#fellows li.fellow:not([data-id='" + id + "'])").length == 0){
							$("strong#no-fellows-found").css("display", "block");
						} else {
							$("strong#no-fellows-found").css("display", "none");
						}
					}
				});
			});

			
			//Click onto submit
				$("button#new-fellow-button").on("click", function() { addNewFellow(); });

			//ENTER THING FROM http://stackoverflow.com/a/6524335/3944068
				$('input#twittername').bind("enterKey",function() {
				   addNewFellow(); 
				});
				$('input#twittername').keyup(function(e) {
				    if(e.keyCode == 13) {
				    	e.preventDefault();
				        $(this).trigger("enterKey");
				    }
				});

			//The original function!
			var addNewFellow = function() {
				if ($("#twittername").val().length) {
					$("#new-fellow-button").html("<img src=\"../app/img/ajax-load-vertical.gif\" alt=\"Waiting\">");

					var request = {
						trip_id: <?= $id ?>,
						twittername: $("#twittername").val()
					};
					$.ajax({
						type: "POST",
						url: 'fellow/add.php',
						data: request,
						success: function(giveback) {
							$("#new-fellow-button").html("Anlegen");
							console.log(giveback);
							
							$("strong#no-fellows-found").css("display", "none");
							$("ul#fellows").append("<li class=\"fellow clearfix\" data-id=\"" + giveback.id + "\" data-deleted=\"false\"><div class=\"left-wrapper\">" +
								"<img class=\"name\" src=\"" + giveback.avatar_url + "\" />" +
								"<span class=\"name\">" + giveback.twittername + "</span>" +
							"</div>" +
							"<div class=\"button-wrapper\">" +
								"<a class=\"delete\" data-id=\"" + giveback.id + "\">&times;</a>" +
							"</div></li>");
						}
					});
				}
			}
		</script>
	</td>
</tr>