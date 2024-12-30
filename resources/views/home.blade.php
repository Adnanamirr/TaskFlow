<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Home</title>
</head>
<body>
<h1>Welcome to TaskFlow</h1>

<nav>
    @auth
        <a href="{{ route('tasks.index') }}">Tasks</a>
        <a href="{{ route('user.index') }}">Users</a>
        <form action="{{ route('user.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @else
        <p>Please Login Or Sign-up</p>
        <a href="{{ route('user.login') }}">Login</a>
        <a href="{{ route('user.register') }}">Sign Up</a>
    @endauth
</nav>

</body>
</html>
