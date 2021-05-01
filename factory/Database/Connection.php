<?php

declare(strict_types=1);

/**
 * This class helps you to connect to the database
 *
 * @author Cleanly1
 */
class Connection {
	/**
	 * Create a new connection instance.
	 *
	 * @param string $database
	 *
	 * @return PDO
	 */
	public static function make($config): PDO {
		try {
			return new PDO(sprintf($config['connection'] . ';dbname=%s', $config['name']), $config['user'], $config['password']);
		} catch (PDOException $e) {
			die(var_dump($e->getMessage()));
		}
	}
}
