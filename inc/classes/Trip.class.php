<?php
class Trip {
	public $DateStart;
	public $DateEnd;
	public $oneDay = FALSE;
	public $DateNotGiven = FALSE;

	public function __construct() {
		$this->DateStart = new DateTime($this->date_start);
		$this->DateEnd = new DateTime($this->date_end);

		//Boolean Expression
		$this->oneDay = ($this->DateStart == $this->DateEnd);

		//Date Not Given
		$this->DateNotGiven = ($this->date_start == '0000-00-00' AND $this->date_end == '0000-00-00');

	}
}