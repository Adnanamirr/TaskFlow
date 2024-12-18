<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>

</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Task Details</h1>

    <div >
        <div >
            <h3>{{ $task->title }}</h3>
        </div>
        <div >
            <p><strong>Description:</strong> {{ $task->description }}</p>

        </div>
        <p><strong>Created At:</strong> {{$task->created_at->diffforHumans()}}</p>
        <p><strong>Updated At:</strong> {{$task->updated_at->diffforHumans()}}</p>
        <div>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
        </div>
    </div>
</div>
</body>
</html>
