<?php

namespace Taskflair\core;

use PDO;
use PDOException;
use Exception;

class database implements DatabaseInterface
{
    private ?PDO $connection = null;

    /**
     * Connect to the database using credentials from .env
     */
    public function connect(): PDO
    {
        if ($this->connection === null) {
            try {
                $driver = env('DATABASE_CONECTION', 'mysql');
                $host = env('DATABASE_HOST', '127.0.0.1');
                $port = env('DATABASE_PORT', '3306');
                $dbname = env('DATABASE_NAME', 'Kechliving_DATABASE');
                $username = env('DATABASE_USERNAME', 'root');
                $password = env('DATABASE_PASSWORD', '');

                $dsn = sprintf(
                    "%s:host=%s;port=%s;dbname=%s;charset=utf8mb4",
                    $driver,
                    $host,
                    $port,
                    $dbname
                );
                
                $this->connection = new PDO($dsn, $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                throw new Exception("Database connection failed: " . $e->getMessage());
            }
        }
        return $this->connection;
    }

    /**
     * Query data and return array
     */
    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Execute update/insert/delete query
     */
    public function execute(string $sql, array $params = []): bool
    {
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute($params);
    }
}