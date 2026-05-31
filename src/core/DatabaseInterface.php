<?php

namespace Taskflair\core;

interface DatabaseInterface
{
    /**
     * Get or initialize the active connection.
     */
    public function connect(): \PDO;

    /**
     * Run a select query and return all results as an array.
     */
    public function query(string $sql, array $params = []): array;

    /**
     * Run an update/delete/insert statement.
     */
    public function execute(string $sql, array $params = []): bool;
}
