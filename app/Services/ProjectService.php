<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Exception;

class ProjectService
{

    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    public function getAll()
    {
        try {
            $data = $this->projectRepository->getAll();
            return $data;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getProject(int $id)
    {
        try {
            return $this->projectRepository->getProject($id);
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function createProject(array $data)
    {
        try {
            return $this->projectRepository->create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateProject(array $data, $id)
    {
        try {
            return $this->projectRepository->update($data, $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteProject($id)
    {
        try {
            return $this->projectRepository->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
