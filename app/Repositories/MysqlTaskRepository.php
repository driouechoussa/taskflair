<?php

namespace App\Repositories;

use Buildilume\core\DatabaseInterface;

class MysqlTaskRepository implements TaskRepositoryInterface
{
    private DatabaseInterface $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findById(int $id): ?array
    {
        $result = $this->db->query("SELECT * FROM tasks WHERE id = :id LIMIT 1", ['id' => $id]);
        return $result[0] ?? null;
    }

    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM tasks ORDER BY id DESC");
    }

    public function create(array $data): bool
    {
        return $this->db->execute(
            "INSERT INTO tasks (title, description, status, priority, due_date) VALUES (:title, :description, :status, :priority, :due_date)",
            [
                'title' => $data['title'],
                'description' => $data['description'] ?? '',
                'status' => $data['status'] ?? 'To Do',
                'priority' => $data['priority'] ?? 'Medium',
                'due_date' => $data['due_date'] ?? null
            ]
        );
    }

    public function update(int $id, array $data): bool
    {
        return $this->db->execute(
            "UPDATE tasks SET title = :title, description = :description, status = :status, priority = :priority, due_date = :due_date WHERE id = :id",
            [
                'id' => $id,
                'title' => $data['title'],
                'description' => $data['description'] ?? '',
                'status' => $data['status'] ?? 'To Do',
                'priority' => $data['priority'] ?? 'Medium',
                'due_date' => $data['due_date'] ?? null
            ]
        );
    }

    public function delete(int $id): bool
    {
        return $this->db->execute("DELETE FROM tasks WHERE id = :id", ['id' => $id]);
    }
}
