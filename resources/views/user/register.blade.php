@extends('layout.app')

@section('title', 'TaskFlow - Register a New User')

@section('content')


    @include('components.success')
    @include('components.error')

    <form action="{{ route('user.store') }}"  method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit" class="btn">Sign Up</button>
        </div>
    </form>

    <p>Already have an account? <a href="{{ route('login') }}" class="btn">Login here</a></p>
@endsection
