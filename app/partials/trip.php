<li class="trip" data-parent="#accordion">
	<a data-toggle="collapse" href="#collapse-<?= $Trip->id ?>">
		<span class="dest"><?= $Trip->Title ?> (<?= count($Trip->Friends) ?>)</span>
		<span class="time clearfix">
			<?php
			echo $Trip->DateStart->format("d.m.Y");
			if (!$Trip->oneDay):
				echo "<br />&mdash;" . $Trip->DateEnd->format("d.m.Y");
			endif; //<if (!$Trip->oneDay): 
			?>
		</span>
	</a>
	<div class="clearfix"></div>
	<div id="collapse-<?= $Trip->id ?>" class="collapse <?= (!($first -1))? "in" : ""; $first = false; ?>" data-lat="<?= $Trip->lat ?>" data-lng="<?= $Trip->lng ?>">
		<blockquote>
			<?= $Parsedown->text($Trip->Description); ?>
		</blockquote>
		<?php if (!empty($Trip->Friends)): ?>
			<h3>Mitfahrend</h3>
			<ul class="friends">
			<?php
			$count = 1;
			foreach ($Trip->Friends as $Name => $URL) : 
				?><li data-count="<?= $count; ?>"
					<?php echo (($count > 2) AND (count($Trip->Friends) > 3)) ? "class=\"to-be-hidden hidden\"" : ""; ?>
					><img class="box" src="<?= $URL ?>" alt="<?= $Name ?>" /></li><?php
				$count++;
			endforeach;

			if (count($Trip->Friends) > 3): 
				?><li class="get-more"><div class="get-more-box box fa fa-ellipsis-h"></div></li><?php
			endif;
			?>
				<li class="be-a-part">
					<a class="be-a-part-box box fa fa-twitter" data-toggle="tooltip" target="_blank" title="Fahre mit nach <?= $Trip->Title ?>" href="<?= Codebird::getIntentLink(["text" => "Ich fahre mit @" . $app->get("site.twitter") . " nach " . html_entity_decode($Trip->Title) . "!"]) ?>"></a>
				</li>
			</ul>
		<?php endif; ?>
	</div>
</li>