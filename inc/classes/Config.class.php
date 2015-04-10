<?php
/*
 * Author: Alex Garrett
 * Project URI: https://www.youtube.com/watch?v=qyKt4NF_82g
 */
class Config {
	protected $data;
	protected $default = null;

	public function __construct($file) {
		$this->data = $file;
	}

	public function get($key, $default = null) {
		$this->default = $default;

		$segments = explode(".", $key);
		$data = $this->data;

		foreach ($segments as $segment) {
			if (isset($data[$segment])) {
				$data = $data[$segment];
			} else {
				$data = $this->default;
				break;
			}
		}

		return $data;
	}

	public function exists($key) {
		return ($this->default !== $this->default);
	}

}