<?php

class Address {
	public $Address;

	public $Lat;
	public $Lng;

	public function __construct($Address_ = "") {
		if(!empty($Address_)) {
			$this->Address = $Address_;
		}
	}

	private function getLatLng() {
		$Address = urlencode($this->Address);
		$call = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=". $Address . "&sensor=false");

		$result = json_decode($call);

		$geometry = $result->results[0]->geometry->location;

		echo $this->Lat = $geometry->lat;
		echo $this->Lng = $geometry->lng;
	}
}