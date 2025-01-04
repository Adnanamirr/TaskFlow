

@extends('layout.app')
@section('title', 'TaskFlow - Users' )

@section('content')
<h1>Users List</h1>
@include('components.success')
@include('components.error')


<div>
    <nav>
    <a href="{{ route('home') }}" class="btn">Home</a>
@auth
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@else
        <a href="{{ route('login') }}" class="btn">Login</a>
@endauth
    </nav>
</div>

@if($currentUser)
    <h1>Hello, {{ $currentUser->name }}</h1>
@endif


@if(count($users) > 0)
<ol>
@foreach ($users as $user)
    <div>
        <a href="{{ route('user.show', ['id' => $user->id]) }}">
           <li> {{ $user->name }}</li>
        </a>
        <form action="{{ route('user.archive', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Archive</button>
        </form>

    </div>
    @endforeach
    </ol>
<a href="{{ route('user.register') }}" class="btn">Sign Up</a>


@else
    <p> No Users available! Please click <a href="{{ route('user.register') }}" class="btn">Sign Up</a> to register new user </p>
@endif

<a href="{{ route('user.archived') }}" class="btn">Archived User</a>

@endsection

