@extends('layouts.app')
@section('content')
    <div class="delete-task-container">
        <h1>Delete Task</h1>

        <p>Are you sure you want to delete the task "{{ $task->name }}"?</p>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button" style="cursor: pointer;">Delete</button>
            <a href="{{ route('tasks.index') }}" class="cancel-button">Cancel</a>
        </form>
    </div>
@endsection
