<?php

return [
	"db" => [
		"host" => "localhost",
		"user" => "root",
		"pass" => "",
		"db" => "bahnplan"
	],
	"site" => [
		"name" => "Jannik",
		"twitter" => "confuzd_",
		"footer" => 'Created with &hearts; in Germany. Checkout the source on [<abbr title="' . exec('git describe --always') . '"><i class="fa fa-github"></i></abbr> Github](https://github.com/jeyemwey/bahnplan). [Admin](admin)'
	],
	"twitter" => [
		"app" => [
			"key" => "YOUR_APP_KEY",
			"secret" => "YOUR_APP_SECRET"
		],
		"user" => [
			"token" => "YOUR_USER_TOKEN",
			"secret" => "YOUR_USER_SECRET"
		]
	]
];