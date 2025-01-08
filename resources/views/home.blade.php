@extends('layout.app')

@section('content')
    <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-lg">
            <div class="max-w-lg mx-auto text-center p-6">
                @auth
                    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Welcome back to TaskFlow</h1>
                    <p class="mt-4 text-lg text-gray-700">Your one-stop solution for managing tasks and users efficiently.</p>

                    <div class="mt-6 flex space-x-4 justify-center">
                        <a href="{{ route('tasks.index') }}"
                           class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold text-lg rounded-md hover:bg-indigo-500">Task List</a>
                 <a href="{{ route('user.index') }}"
                           class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold text-lg rounded-md hover:bg-indigo-500">User List</a>
                    </div>
                @else
                    <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">Welcome to TaskFlow</h1>
                    <p class="mt-4 text-lg text-gray-700">Your one-stop solution for managing tasks and users efficiently.</p>

                    <div class="mt-6 flex space-x-4 justify-center">
                        <a href="{{ route('login') }}"
                           class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold text-lg rounded-md hover:bg-indigo-500">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
