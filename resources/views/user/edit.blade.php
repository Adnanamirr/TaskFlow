<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
<h1>Edit User</h1>



<form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">User Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">

    <button type="submit">Update User</button>
</form>

<a href="{{ route('user.index') }}">Back to User List</a>
</body>
</html>
