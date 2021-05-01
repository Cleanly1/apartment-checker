<?php

declare(strict_types=1);

/**
 * This is the query builder instance.
 *
 * @author Cleanly1
 */
class QueryBuilder {
	/**
	 * The pdo instance.
	 *
	 * @var PDO
	 */
	protected PDO $pdo;

	/**
	 * The sql query.
	 *
	 * @var string
	 */
	protected string $query;

	/**
	 * Create a new query builder instance.
	 *
	 * @param PDO $pdo
	 *
	 * @return void
	 */
	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	/**
	 * Add select columns to table.
	 *
	 * @param array $columns
	 *
	 * @return self
	 */
	public function select(array $columns = ['*']): self {
		$this->query = sprintf('SELECT %s', implode(', ', $columns));

		return $this;
	}

	/**
	 * Set the query table.
	 *
	 * @param string $table
	 *
	 * @return self
	 */
	public function from(string $table): self {
		$this->query = sprintf('%s FROM %s', $this->query, $table);

		return $this;
	}

	/**
	 * Prepare and execute the query.
	 *
	 * @return array
	 */
	public function get(): array {
		$statement = $this->pdo->prepare($this->query);

		$statement->execute();

		if ($result = $statement->fetchAll(PDO::FETCH_CLASS)) {
			return $result;
		}

		return [];
	}

	public function limit(int $limit): self {
		$this->query = sprintf('%s LIMIT %s', $this->query, $limit);

		return $this;
	}

	public function orderBy(string $column = 'id', string $direction = 'asc'): self {
		$this->query = sprintf('%s ORDER BY %s %s', $this->query, $column, $direction);

		return $this;
	}

	public function first(): object {
		$statement = $this->pdo->prepare($this->query);

		$statement->execute();

		return $statement->fetch(PDO::FETCH_OBJ);
	}

	public function where(string $column, string $operator, string $value, string $andOr = ""): self {
		$this->query = sprintf('%s WHERE %s %s %s %s', $this->query, $column, $operator, $value, $andOr);

		return $this;
	}

	public function groupBy(string $column): self {
		$this->query = sprintf('%s GROUP BY %s', $this->query, $column);

		return $this;
	}
}
