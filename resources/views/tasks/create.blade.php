@extends('layout.app')

@section('title', 'TaskFlow - Create Task')

@section('content')

    @include('components.success')
    @include('components.error')

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Task Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
        </div>

        <input type="hidden" name="project_id" value="1">

        <div>
            <button type="submit" class="btn">Create Task</button>
        </div>
    </form>

    <a href="{{ route('tasks.index') }}" class="btn">Back to Task List</a>
@endsection
