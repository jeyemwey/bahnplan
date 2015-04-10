#bahnplan

Place to share my travel plans.

## Set up

In the folder `inc`, you can find a file called `Configuration.sample.php`. Duplicate it and delete ".sample", so you have `Configuration.php`. In there, you can find some default database config:

	"db" => [
		"host" => "localhost",
		"user" => "root",
		"pass" => "",
		"db" => "bahnplan"
	]

Change this to your database config. At this point, you may also change the other things as you surely don't want to promote my Travel plans, but your own. `footer` supports markdown. Please enclosure all `"` with backslashes (`\`).

### Twitter

In order to grab data from Twitter (eg avatar pictures), Twitter requires you to create an **application** at [apps.twitter.com](https://apps.twitter.com/). You'll have to do the following steps:

1. Create an app (name it whatever you want).
2. Change the __Access Level__ to "Read and write".
3. Create yourself an Access Token in the "*Keys and Access Tokens*"-tab. You will find that button on the bottom of the page.
4. Then open your `Configuration.php` and change the following code:


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

Change the things to the stuff you have from Twitter.

## Access

You can access *admin/* with credentials: `jannik` : `123456`.

## Makes use of:

* scss
* font-awesome
* Google Maps API 3
* jquery
* Bootstrap
* Parsedown
* [p](https://gist.github.com/jeyemwey/08aaf0d57fbd67c5a798)
* Codebird-PHP
* [AJAXload](http://www.ajaxload.info/)
* [Config Class](https://www.youtube.com/watch?v=qyKt4NF_82g)

## Thanks to

* The guy on [StackOverflow](http://stackoverflow.com/questions/29059090/table-inside-of-another) who gave me the query string.

## Me on Twitter
[@gltyllthsm](https://twitter.iamjannik.me)