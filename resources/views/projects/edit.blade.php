@extends('layouts.app')
@section('content')
    <div class="edit-task-container">
        <h1>Edit Project</h1>
        <a href="{{ route('projects.index') }}" class="create-link">Back</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('projects.update', $project->id) }}" method="post" class="task-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" id="name" name="name" value="{{ $project->name }}" required>
            </div>

            </div>

            <button type="submit" class="create-button">Update Project</button>
        </form>
    </div>
@endsection
