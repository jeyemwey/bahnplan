<li class="trip">
	<a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $Trip->id ?>">
		<span class="dest"><?= $Trip->Title ?></span>
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
	<div id="collapse-<?= $Trip->id ?>" class="collapse <?= (!($Trip->id -1))? "in" : "" ?>">
		<blockquote>
			<?= $Parsedown->text($Trip->Description); ?>
		</blockquote>
		<?php if (!empty($Trip->Friends)): ?>
			<h3>Mitfahrend</h3>
			<ul class="friends">
			<?php foreach ($Trip->Friends as $Name => $URL) : ?>
				<li><img src="<?= $URL ?>" alt="<?= $Name ?>" /></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</li>