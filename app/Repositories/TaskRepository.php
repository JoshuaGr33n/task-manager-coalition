<?php

namespace App\Repositories;

use App\Models\{Task, Project};

class TaskRepository
{
    public function getAll()
    {
        return Task::all();
    }
    public function getSelected($projectId)
    {
        return Project::findOrFail($projectId)->tasks;
    }
    public function getTask(int $taskId)
    {
        return Task::find($taskId);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }
    public function update(array $data, int $taskId)
    {
        Task::find($taskId)->update($data);
    }
    public function delete($taskId)
    { 
        Task::find($taskId)->delete();
    }
}
