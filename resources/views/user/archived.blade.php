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
@if(count($archivedUser) > 0)
<ol>
    @foreach ($archivedUser as $user)
    <div>


        <li>
            <a href="{{ route('user.show', ['id' => $user->id]) }}">
                {{ $user->name }}
            </a>
        </li>
        <form action="{{route('user.forceDelete', ['id' => $user->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type = 'submit' >Permanently Delete</button>
        </form>
        <a href="{{route('user.restore',['id' => $user->id])}}">Restore</a>

    </div>
    @endforeach
</ol>
@else
    <p>No Users available!</p>
@endif
<a href="{{route('user.index')}}">All Users</a>
{{--<a href="{{ route('user.register') }}">Sign-up</a>--}}
</body>
</html>
