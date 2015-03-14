<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Janniks Bahnplan</title>
	<link rel="stylesheet" type="text/css" href="app/css/application.css" />
	<link rel="stylesheet" type="text/css" href="app/css/font-awesome.min.css" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300|Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<div id="sidebar">
			<div id="logo-wrapper">
				<div id="logo">
					<h1><i class="fa fa-train"></i> Janniks Bahnplan</h1>
				</div>
			</div>
			<ul id="trippoints" id="accordion">
				<?php for ($i=0; $i < 2; $i++) : ?>
					<li class="trip">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">
							<span class="dest">Berlin</span>
							<span class="time">11.07.2015</span>
						</a>
						<div id="collapse<?= $i ?>" class="collapse <?= (!$i)? "in" : "" ?>">
							<blockquote>
								#twerlin
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
				<?php endfor; ?>
			</ul>
		</div>
		<!--<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2549979.6440863633!2d9.767473844438895!3d51.38073571222702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479a721ec2b1be6b%3A0x75e85d6b8e91e55b!2sDeutschland!5e0!3m2!1sde!2sde!4v1426350191057" frameborder="0" style="border:0"></iframe>-->
		<div id="map_canvas"></div>
	</div>
	<script type="text/javascript" src="app/js/app.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>