<?php

/**
 * @author Cleanly1 
 */
class Routes {

	/**
	 * The seperator for views/pages files
	 * @var string 
	 */
	protected string $needle;
	/**
	 * Name of the directory where your views/pages
	 * @var string
	 */
	protected string $dir;
	/**
	 * The prefix needed to get to the root of the project to find the views directory
	 * @var string
	 */
	protected string $prefix;

	function __construct(string $needle, string $dir, string $dirPrefix) {
		$this->needle = $needle;
		$this->dir = $dir;
		$this->prefix = $dirPrefix;
	}

	/**
	 * Gets all the routes from the views/page directory
	 *
	 * @return string[]
	 */
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
