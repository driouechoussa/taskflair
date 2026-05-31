<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;

class TaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get all active tasks.
     */
    public function getActiveTasks(): array
    {
        return $this->taskRepository->getAll();
    }

    /**
     * Find a task by ID.
     */
    public function getTask(int $id): ?array
    {
        return $this->taskRepository->findById($id);
    }

    /**
     * Create a task with basic domain validation/manipulation.
     */
    public function createNewTask(array $data): array
    {
        if (empty($data['title'])) {
            return ['success' => false, 'error' => 'Task title is required.'];
        }

        // Default priority check: Today's tasks are automatically high priority
        if (isset($data['due_date']) && $data['due_date'] === date('Y-m-d')) {
            $data['priority'] = 'High';
        }

        $success = $this->taskRepository->create($data);
        return ['success' => $success];
    }

    /**
     * Update a task.
     */
    public function updateTask(int $id, array $data): array
    {
        if (empty($data['title'])) {
            return ['success' => false, 'error' => 'Task title is required.'];
        }

        $success = $this->taskRepository->update($id, $data);
        return ['success' => $success];
    }

    /**
     * Delete a task.
     */
    public function deleteTask(int $id): bool
    {
        return $this->taskRepository->delete($id);
    }
}
