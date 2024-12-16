<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Home</title>
</head>
<body>
<h1>Welcome to TaskFlow</h1>
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
</body>
</html>
