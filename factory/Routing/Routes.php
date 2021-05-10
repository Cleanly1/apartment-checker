<?php

class Routes {

	protected $needle;
	protected $dir;
	protected $prefix;

	function __construct(string $needle, string $dir, string $dirPrefix) {
		$this->needle = $needle;
		$this->dir = $dir;
		$this->prefix = $dirPrefix;
	}

	function getRoutes() {
		$array = array_filter(scandir(__DIR__ . $this->prefix . $this->dir), function ($file) {
			return str_contains($file, $this->needle);
		});


		foreach ($array as $key => $value) {
			$newKey = str_split($value, strpos($value, '.'))[0];
			$newKey = $newKey == 'index' ? '' : $newKey;
			$array[$newKey] = __DIR__ . $this->prefix . $this->dir . '/' . $value;
			unset($array[$key]);
		}

		return $array;
	}
}
