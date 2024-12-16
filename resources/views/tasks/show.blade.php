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
    <div class="card mx-auto w-50">
        <div class="card-header">
            <h3>{{ $task->title }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Status:</strong> {{ $task->is_completed ? 'Completed' : 'Pending' }}</p>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>
        </div>
    </div>
</div>
</body>
</html>
