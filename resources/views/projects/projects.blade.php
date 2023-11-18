@extends('layouts.app')
@section('content')
<div class="create-task-container">
    <h1>Create Project</h1>
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
    <form action="{{ route('projects.store') }}" method="post" class="task-form">
        @csrf
        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name')}}">
        </div>

        <button type="submit" class="create-button">Create Project</button>
    </form>


    <table>
        <thead>
            <tr>
                <th></th>
                <th>Project Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($hasProjects)
            @foreach($projects as $project)
            <tr>
                <td></td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->created_at->diffForHumans() }}</td>
                <td>{{ $project->updated_at->diffForHumans() }}</td>
                <td><a href="{{ route('projects.edit', $project->id) }}">Edit</a> <a href="{{ route('projects.confirm', $project->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
            @else
            <p>No projects available.</p>
            @endif
        </tbody>
    </table>
</div>
@endsection