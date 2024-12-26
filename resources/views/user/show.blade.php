<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>

</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">User Details</h1>

    <div >
        <div >
            <h3>{{ $user->name }}</h3>
        </div>
        <div >
            <p><strong>Email:</strong> {{ $user->email }}</p>

        </div>
        <p><strong>Created At:</strong> {{$user->created_at->diffforHumans()}}</p>
        <p><strong>Updated At:</strong> {{$user->updated_at->diffforHumans()}}</p>

    </div>
    <div>
        <a href="{{ route('user.index') }}" >Back to Users</a>

        <a href="{{ route('user.edit', ['id' => $user->id]) }}">Edit</a>
    </div>
</div>
</body>
</html>
