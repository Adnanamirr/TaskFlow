<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Task Title:</label>
    <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required>{{ old('description', $task->description) }}</textarea>

    <input type="hidden" name="project_id" value="1">

    <button type="submit">Update Task</button>
</form>
<a href="{{ route('tasks.index') }}">Back to Task List</a>
</body>
</html>
