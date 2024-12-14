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
        <li>{{ $task->title }} - {{ $task->completed ? 'Completed' : 'Pending' }}</li>
    @endforeach
</ul>
<a href="/">Go Back</a>
</body>
</html>
