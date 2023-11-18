@extends('layouts.app')
@section('content')
<div class="create-task-container">
    <h1>Create Task</h1>
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
    <form action="{{ route('tasks.store') }}" method="post" class="task-form">
        @csrf
        <div class="form-group">
            <label for="name">Task Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name')}}">
        </div>

        <div class="form-group">
            <label for="project_id">Project:</label>
            <select id="project_id" name="project_id" required>
                <option selected disabled>Select Project</option>
                @if($hasProjects)
                @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
                @else
                <option>No projects available.</option>
                @endif
            </select>
        </div>

        <button type="submit" class="create-button">Create Task</button>
    </form>
</div>
@endsection