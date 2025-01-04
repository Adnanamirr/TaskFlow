@extends('layout.app')

@section('title', 'TaskFlow - Archived Users')

@section('content')
    <h1>Archived Users</h1>

    @include('components.success')
    @include('components.error')

    <div>
        <a href="{{ route('home') }}" class="btn" >Home</a>
        @auth
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>

    @if(count($archivedUser) > 0)
        <ol>
            @foreach ($archivedUser as $user)
                <div>
                    <li>
                        <a href="{{ route('user.show', ['id' => $user->id]) }}">
                            {{ $user->name }}
                        </a>
                    </li>

                    <form action="{{ route('user.forceDelete', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Permanently Delete</button>
                    </form>

                    <a href="{{ route('user.restore', ['id' => $user->id]) }}">Restore</a>
                </div>
            @endforeach
        </ol>
    @else
        <p>No Users available! </p>
    @endif

    <a href="{{ route('user.index') }}" class="btn">All Users</a>
@endsection
