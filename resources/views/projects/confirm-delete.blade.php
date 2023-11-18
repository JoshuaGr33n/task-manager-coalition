@extends('layouts.app')
@section('content')
    <div class="delete-task-container">
        <h1>Delete Project</h1>

        <p>Are you sure you want to delete {{ $project->name }} and all tasks associated with it?</p>

        <form action="{{ route('projects.destroy', $project->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button" style="cursor: pointer;">Delete</button>
            <a href="{{ route('projects.index') }}" class="cancel-button">Cancel</a>
        </form>
    </div>
@endsection
