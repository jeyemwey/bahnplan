<?php

class User {
	public $IsLoggedIn = false;
	private $mysqli;

	public function __construct($mysqli) {
		$this->mysqli = $mysqli;
	}
	public function CheckLogin($id_, $hash_) {

		$id = (int) $id_;
		$hash = mysql_real_escape_string($hash_);

		$Query = $this->mysqli->query("SELECT name from users WHERE id = " . $id . " AND hash = \"{$hash}\"") or die($this->mysqli->error);
		if ($Query->num_rows) {
			$this->IsLoggedIn = true;
			return 1;
		} else
			return;
	}
}