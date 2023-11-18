<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use Illuminate\Http\Request;
use App\Http\Requests\{CreateProjectRequest, UpdateProjectRequest};

class ProjectController extends Controller
{
    protected $projectService;

    /**
     * ProjectController constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectService->getAll();
        $hasProjects = count($projects) > 0;
        return view('projects/projects', ['projects' => $projects, 'hasProjects' => $hasProjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $this->projectService->createProject($request->all());
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = $this->projectService->getProject($id);
        return view('projects/edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $this->projectService->updateProject($request->all(), $id);
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->projectService->deleteProject($id);
        return redirect()->route('projects.index');
    }

    public function confirmDelete($id)
    {
        $project = $this->projectService->getProject($id);
        return view('projects/confirm-delete', ['project' => $project]);
    }
}
