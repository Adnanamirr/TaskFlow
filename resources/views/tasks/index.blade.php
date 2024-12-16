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
    @foreach ($tasks as $task)
        <div>
            <a href="{{route('tasks.show',$task->id)}}">
                {{$task->title}}
            </a>
        </div>
    @endforeach
</ul>
<a href="/">Go Back</a>
<a href="{{ route('tasks.create') }}">Create Task</a>
</body>
</html>
