@extends('layout.app')

@section('title', 'TaskFlow - Archived Tasks')

@section('content')

    @include('components.success')
    @include('components.error')

    @if(count($archivedTasks) > 0)
        <ol>
            @foreach ($archivedTasks as $task)
                <div>
                    <li>
                        <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
                            {{ $task->title }}
                        </a>
                    </li>

                    <form action="{{ route('tasks.forceDelete', ['id' => $task->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Permanently Delete</button>
                    </form>

                    <a href="{{ route('tasks.restore', ['id' => $task->id]) }}" class="btn">Restore</a>
                </div>
            @endforeach
        </ol>
    @else
        <p>No tasks available!</p>
    @endif

    <a href="{{ route('tasks.index') }}" class="btn">All Tasks</a>
@endsection
