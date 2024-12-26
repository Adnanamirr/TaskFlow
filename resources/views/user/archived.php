<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
</head>
<body>
<h1>Welcome to TaskFlow</h1>
@if(session('success'))
<div style="color: green;">
    {{ session('success') }}
</div>
@endif
<ol>
    @foreach ($archivedUser as $user)
    <div>


        <li>
            <a href="{{ route('user.show', ['id' => $user->id]) }}">
                {{ $user->name }}
            </a>
        </li>

<!--        <form action="{{route('user.forceDelete', ['id' => $user->id])}}" method="POST">-->
<!--            @csrf-->
<!--            @method('DELETE')-->
<!--            <button type = 'submit' >Permanently Delete</button>-->
<!--        </form>-->
<!--        <a href="{{route('user.restore',['id' => $user->id])}}">Restore</a>-->
    </div>
    @endforeach
</ol>
<a href="{{route('tasks.index')}}">All Tasks</a>
<a href="{{ route('tasks.create') }}">Create Task</a>
</body>
</html>
