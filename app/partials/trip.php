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
			<?= $Trip->Description; ?>
		</blockquote>
		<h3>Mitfahrend</h3>
		<ul class="friends">
			<li><img src="https://pbs.twimg.com/profile_images/555247027752550401/QEn0q7Ta_bigger.jpeg" alt="Gina" /></li>
			<li><img src="https://pbs.twimg.com/profile_images/575296861684260865/MPGh9Rd7_bigger.jpeg" alt="Lauro" /></li>
			<li><img src="https://pbs.twimg.com/profile_images/575304825304322048/UtfZgF72_bigger.jpeg" alt="Adri" /></li>
			<li><img src="https://pbs.twimg.com/profile_images/531402007769522176/Qgm4v-Ts_bigger.jpeg" alt="Jess" /></li>
		</ul>
	</div>
</li>