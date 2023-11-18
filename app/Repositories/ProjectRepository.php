<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function getAll()
    {
        return Project::orderby('id', 'desc')->get();
    }
    public function getProject(int $id)
    {
        return Project::find($id);
    }

    public function create(array $data)
    {
        return Project::create($data);
    }
    public function update(array $data, int $id)
    {
        Project::find($id)->update($data);
    }
    public function delete($id)
    { 
        Project::find($id)->delete();
    }
    
}
