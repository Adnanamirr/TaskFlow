<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
</head>
<body>
<h1>Archived Users</h1>
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
</div>
    @endforeach
</ol>
<a href="{{route('user.index')}}">All Users</a>
<a href="{{ route('user.create') }}">Sign-up</a>
</body>
</html>
