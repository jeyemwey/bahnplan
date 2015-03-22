#bahnplan

Place to share my travel plans.

## Set up
In order to grab data from Twitter (eg avatar pictures), Twitter requires you to create an **application** at [apps.twitter.com](https://apps.twitter.com/). You'll have to do the following steps:

1. Create an app (name it whatever you want).
2. Change the __Access Level__ to "Read and write".
3. Create yourself an Access Token in the "*Keys and Access Tokens*"-tab. You will find that button on the bottom of the page.
4. Go into your database management system and create new datasets for the table `infos`. 
  
   Create four new datasets:

 * property: `twitter_app_key` with content: __Consumer Key (API Key)__ from the table at Twitter 
 * property: `twitter_app_secret` with content: __Consumer Secret (API Secret)__
 * property: `twitter_my_token` with content: __Access Token__
 * property: `twitter_my_secret` with content: __Access Token Secret__ 

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

## Thanks to

* The guy on [StackOverflow](http://stackoverflow.com/questions/29059090/table-inside-of-another) who gave me the query string.

## Me on Twitter
[@gltyllthsm](https://twitter.iamjannik.me)