<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Home</title>
</head>
<body>
<h1>Welcome to TaskFlow</h1>
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
<ul>
    @foreach ($archivedTasks as $task)
        <div>
            <a href="{{route('tasks.show',['id' => $task->id])}}">
                {{$task->title}}
            </a>
            <form action="{{route('tasks.forceDelete', ['id' => $task->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type = 'submit' >Permanently Delete</button>
            </form>
            <a href="{{route('tasks.restore',['id' => $task->id])}}">Restore</a>
        </div>
    @endforeach
</ul>
<a href="{{route('tasks.index')}}">All Tasks</a>
<a href="{{ route('tasks.create') }}">Create Task</a>
</body>
</html>
