@extends('layout.app')

@section('title', 'TaskFlow - User Details')

@section('content')
    <div class="container mt-5">

        <div>
            <h1>{{ $user->name }}</h1>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Created At:</strong> {{ $user->created_at->diffForHumans() }}</p>
            <p><strong>Updated At:</strong> {{ $user->updated_at->diffForHumans() }}</p>
        </div>

        <div>
            <a href="{{ route('user.index') }}" class="btn">Back to Users</a>
            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn">Edit</a>
        </div>
    </div>
@endsection
