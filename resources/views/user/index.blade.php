<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Home</title>
</head>
<body>
<h1>Users List</h1>
<ol>
@foreach ($users as $user)
    <div>
        <a href="{{ route('user.show', ['id' => $user->id]) }}">
           <li> {{ $user->name }}</li>
        </a>
        <form action="{{ route('user.archive', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Archive</button>
        </form>

    </div>
    @endforeach
    </ol>

<a href="{{ route('user.create') }}">Sign Up</a>
<a href="{{ route('tasks.archived') }}">Archived Tasks</a>

</body>
</html>
