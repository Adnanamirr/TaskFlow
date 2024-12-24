<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
<h1>Create a New User</h1>
<form action="{{route('user.store')}}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <textarea name="email" id="email" required></textarea>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Sign Up</button>
</form>
</body>
</html>
