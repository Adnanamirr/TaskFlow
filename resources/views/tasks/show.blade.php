@extends('layout.app')

@section('content')


    <div class="container mt-10 max-w-4xl mx-auto p-4 bg-gray-100 rounded shadow">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $task->title }}</h1>
            <p class="text-gray-600 mt-2"><strong>Email:</strong> {{  $task->description }}</p>
            <p class="text-gray-600"><strong>Created At:</strong> {{ $task->created_at->diffForHumans() }}</p>
            <p class="text-gray-600"><strong>Updated At:</strong> {{ $task->updated_at->diffForHumans() }}</p>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('tasks.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                Back to Users
            </a>
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                Edit
            </a>
        </div>
    </div>
@endsection
