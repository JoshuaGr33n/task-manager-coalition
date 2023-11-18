<?php

namespace App\Http\Controllers;

use App\Services\{TaskService, ProjectService};
use Illuminate\Http\Request;
use App\Http\Requests\{CreateTaskRequest, UpdateTaskRequest};

class TaskController extends Controller
{
    protected $taskService;
    protected $projectService;

    /**
     * TaskController constructor.
     * @param TaskService $taskService
     * @param ProjectService $projectService
     */
    public function __construct(TaskService $taskService, ProjectService $projectService)
    {
        $this->taskService = $taskService;
        $this->projectService = $projectService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = $this->projectService->getAll();
        $hasProjects = count($projects) > 0;
        $tasks = $this->taskService->getAll($request->input('projectSelect'));
        $hasTasks = count($tasks) > 0;
        return view('tasks', ['tasks' => $tasks, 'hasTasks' => $hasTasks, 'projects' => $projects, 'hasProjects' => $hasProjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = $this->projectService->getAll();
        $hasProjects = count($projects) > 0;
        return view('create', ['projects' => $projects, 'hasProjects' => $hasProjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $this->taskService->createTask($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
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
    public function edit(int $id)
    {
        $projects = $this->projectService->getAll();
        $task = $this->taskService->getTask($id);
        return view('edit', ['task' => $task, 'projects' => $projects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->getTask($id);
        $this->taskService->updateTask($request->all(), $id);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index');
    }

    public function confirmDelete($taskId)
    {
        $task = $this->taskService->getTask($taskId);
        return view('confirm-delete', ['task' => $task]);
    }

    public function updatePriority(Request $request)
    {
        $this->taskService->updatePosition($request->input('position'));
        return response()->json(['success' => true]);
    }
}
