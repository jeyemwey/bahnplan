<?php

class Trip {
	public $DateStart;
	public $DateEnd;
	public $oneDay = FALSE;
	public $Friends = [];
	

	public function __construct() {
		$this->DateStart = new DateTime($this->date_start);
		$this->DateEnd = new DateTime($this->date_end);

		//Boolean Expression
		$this->oneDay = ($this->DateStart == $this->DateEnd);

		//match Friends with URLS
		$FriendNames = explode(",", $this->twitternames);
		$FriendUrls = explode(",", $this->avatar_urls);
		for ($i=0; $i < count($FriendNames); $i++) { 
			$this->Friends[$FriendNames[$i]] = $FriendUrls[$i];
		}

		//var_dump($this);
	}
}