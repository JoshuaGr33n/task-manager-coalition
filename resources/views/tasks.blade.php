@extends('layouts.app')
@section('content')
<h1>Task Manager</h1>
<form id="projectForm" action="{{ route('tasks.index') }}" method="GET">
    @csrf
    <label for="projectSelect">Select Project:</label>
    <select id="projectSelect" name="projectSelect" onchange="updateFormAction()">
        <option value="" selected disabled>Select Project</option>
        <option value="">All</option>
        @if($hasProjects)
        @foreach($projects as $project)
        <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
        @else
        <option>No projects available</option>
        @endif
</select>
</form>

<a href="{{ route('tasks.create') }}" class="create-link">Create Task</a>
<a href="{{ route('projects.index') }}" class="create-project-link">Projects</a>
<table>
    <thead>
        <tr>
            <th></th>
            <th>Task Name</th>
            <th>Priority</th>
            <th>Project</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="row-position">
        @if($hasTasks)
        @foreach($tasks as $task)
        <tr id="{{ $task->id }}">
            <td></td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->priority }}</td>
            <td>{{ $task->project->name }}</td>
            <td>{{ $task->created_at->diffForHumans() }}</td>
            <td>{{ $task->updated_at->diffForHumans() }}</td>
            <td><a href="{{ route('tasks.edit', $task->id) }}">Edit</a> <a href="{{ route('tasks.confirm', $task->id) }}">Delete</a>
                <!-- <a href="{{ route('tasks.destroy', $task->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();">Delete</a>
                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form> -->
            </td>
        </tr>
        @endforeach
        @else
        <p>No tasks available.</p>
        @endif
    </tbody>
</table>
<script src="{{ asset('js/script.js') }}"></script>
@endsection