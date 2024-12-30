<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Home</title>
</head>
<body>
<h1>Welcome to TaskFlow</h1>

<div>
    <a href="{{route('home')}}">Home</a>
    </div>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if(count($tasks) > 0 )
    <ul>
        @foreach ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
                    {{ $task->title }}
                </a>
                <form action="{{ route('tasks.archive', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Archive</button>
                </form>
            </div>
        @endforeach
    </ul>

    <a href="{{ route('tasks.create') }}">Create Task</a>
    <a href="{{ route('tasks.archived') }}">Archived Tasks</a>
@else
    <p>No tasks available! Please click <a href="{{ route('tasks.create') }}">Create Task</a> to create a new task</p>
@endif


</body>
</html>
