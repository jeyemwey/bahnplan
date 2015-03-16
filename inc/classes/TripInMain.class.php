<?php

class TripInMain extends Trip {
	public $Friends = [];

	public function __construct() {
		parent::__construct();
		
		//match Friends with URLS
		$FriendNames = explode(",", $this->twitternames);
		$FriendUrls = explode(",", $this->avatar_urls);
		for ($i=0; $i < count($FriendNames); $i++) { 
			$this->Friends[$FriendNames[$i]] = $FriendUrls[$i];
		}

		//Coords
		$Coords = explode(",", $this->marker_coords);
		$this->lat = trim($Coords[0]);
		$this->lng = trim($Coords[1]);

		//var_dump($this);
	}
}