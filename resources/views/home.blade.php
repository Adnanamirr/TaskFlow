@extends('layout.app')

@section('title', 'TaskFlow - Home')

@section('content')

    @include('components.success')

    <nav>
        @auth
            <a href="{{ route('tasks.index') }}" class="btn">Tasks</a>
            <a href="{{ route('user.index') }}" class="btn">Users</a>
            <form action="{{ route('user.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <p>Please Login or Sign Up</p>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('user.register') }}" class="btn">Sign Up</a>
        @endauth
    </nav>
@endsection
