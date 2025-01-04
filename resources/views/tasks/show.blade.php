@extends('layout.app')

@section('title', 'Task Details')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Task Details</h1>

        <div>
            <h3>{{ $task->title }}</h3>
            <p><strong>Description:</strong> {{ $task->description }}</p>

            <p><strong>Created At:</strong> {{ $task->created_at->diffForHumans() }}</p>
            <p><strong>Updated At:</strong> {{ $task->updated_at->diffForHumans() }}</p>
        </div>

        <div>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>

            @if(!$task->trashed())
                <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-secondary">Edit</a>
            @endif
        </div>
    </div>
@endsection
