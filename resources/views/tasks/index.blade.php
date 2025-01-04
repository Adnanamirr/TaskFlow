@extends('layout.app')

@section('title', 'TaskFlow - All Tasks')

@section('content')


    <div>
        <a href="{{ route('home') }}" class="btn">Home</a>
    </div>

    @include('components.success')

    @if(count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
                        {{ $task->title }}
                    </a>

                    <form action="{{ route('tasks.archive', ['id' => $task->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to archive this task?')" class="btn">Archive</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div>
            <a href="{{ route('tasks.create') }}" class="btn">Create Task</a>
            <a href="{{ route('tasks.archived') }}" class="btn">Archived Tasks</a>
        </div>
    @else
        <p>No tasks available! Please click <a href="{{ route('tasks.create') }}" class="btn">Create Task</a> to create a new task.</p>
    @endif
@endsection
