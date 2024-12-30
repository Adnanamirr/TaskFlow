<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
<h1>Login</h1>
<div>
    <a href="{{ route('user.register') }}">Sign Up</a>

</div>
@if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
<form action="{{ route('user.login.submit') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Login</button>
</form>

</body>
</html>
