<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Home</title>
</head>
<body>
<h1>Users List</h1>
<div>
    <a href="/">Home</a>
    <a href="{{ route('user.login') }}">Login</a>

</div>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
@if(count($users) > 0)
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


@else
    <p> No Users available! Please click <a href="{{ route('user.create') }}">Sign Up</a> to register new user </p>
@endif

<a href="{{ route('user.archived') }}">Archived User</a>

</body>
</html>
