<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Exception;

class TaskService
{

    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    public function getAll($projectId)
    {
        try {
            $data = ($projectId) ?  $this->taskRepository->getSelected($projectId)->sortBy('priority') : $this->taskRepository->getAll()->sortBy('priority');
            return $data;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getTask(int $taskId)
    {
        try {
            return $this->taskRepository->getTask($taskId);
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function createTask(array $data)
    {
        try {
            return $this->taskRepository->create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateTask(array $data, $taskId)
    {
        try {
            return $this->taskRepository->update($data, $taskId);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteTask($taskId)
    {
        try {
            return $this->taskRepository->delete($taskId);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updatePosition($positions)
    {
        try {
            foreach ($positions as $index => $taskId) {
                $this->taskRepository->getTask($taskId)->update(['priority' => $index + 1]);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
