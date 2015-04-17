<?php

class Address {
	public $Address;

	public $Lat = 3;
	public $Lng = 3;

	public function __construct($Address_ = "") {
		if(!empty($Address_)) {
			$this->Address = $Address_;
		}
	}

	public function getLatLng() {
		$Address = urlencode($this->Address);
		$call = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=". $Address . "&sensor=false");

		$result = json_decode($call);

		$geometry = $result->results[0]->geometry->location;

		$this->Lat = $geometry->lat;
		$this->Lng = $geometry->lng;
	}
}