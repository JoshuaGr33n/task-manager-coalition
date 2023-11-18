@extends('layouts.app')
@section('content')
    <div class="edit-task-container">
        <h1>Edit Task</h1>
        <a href="{{ route('tasks.index') }}" class="create-link">Back</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tasks.update', $task->id) }}" method="post" class="task-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" id="name" name="name" value="{{ $task->name }}" required>
            </div>

            <div class="form-group">
                <label for="project_id">Project:</label>
                <select id="project_id" name="project_id" required>
                <option value="{{ $task->project->id }}">{{ $task->project->name }}</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="create-button">Update Task</button>
        </form>
    </div>
@endsection
