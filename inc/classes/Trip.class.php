<?php
class Trip {
	public $DateStart;
	public $DateEnd;
	public $oneDay = FALSE;

	public function __construct() {
		$this->DateStart = new DateTime($this->date_start);
		$this->DateEnd = new DateTime($this->date_end);

		//Boolean Expression
		$this->oneDay = ($this->DateStart == $this->DateEnd);
	}
}