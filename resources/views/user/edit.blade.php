@extends('layout.app')

@section('title', 'TaskFlow - Edit User')

@section('content')
    <h1>Edit User</h1>

    @include('components.success')
    @include('components.error')

    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">User Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <button type="submit" class="btn" >Update User</button>
        </div>
    </form>

    <a href="{{ route('user.index') }}" class="btn">Back to User List</a>
@endsection
