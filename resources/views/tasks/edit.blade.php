@extends('layout.app')

@section('title', 'TaskFlow - Edit Task')

@section('content')

    @include('components.success')
    @include('components.error')

    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Task Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ old('description', $task->description) }}</textarea>
        </div>

        <input type="hidden" name="project_id" value="1">

        <div>
            <button type="submit" class="btn">Update Task</button>
        </div>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn">Back to Task List</a>
@endsection
