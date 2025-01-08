<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">

    <title>TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-full">



<nav class="bg-gray-800 p-4  shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/" class="{{ Route::currentRouteName() === '/' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Home
                        </a>
                        @auth
                            <a href="{{ route('user.index') }}" class="{{Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Users
                            </a>
                            <a href="{{ route('tasks.index') }}" class="{{ Route::currentRouteName() === 'tasks.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Tasks
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth

                </div>
                <div class="ml-3">
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-500 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                    </form>
                </div>
                @else
                    <div class="ml-3">
                        <a href="{{ route('user.register') }}" class="{{ request()->is('user.register') ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Register
                        </a>
                        <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Log In
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>


<div class="flex h-screen">
    <aside class="bg-gray-700 text-white w-64 p-4 space-y-6">
        <nav class="space-y-4">
            <a href="/" class="block hover:bg-gray-600 px-3 py-2 rounded-md">Dashboard</a>

            @auth

                <a href="{{ route('user.index') }}"  class="{{ Route::currentRouteName() === 'user.index' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Users</a>

                <a href="{{ route('user.archived') }}" class="{{ Route::currentRouteName() === 'user.archived' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">Archived Users</a>
                <a href="{{ route('user.register') }}"
                   class="{{ Route::currentRouteName() === 'user.register' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                    New User
                </a>
            @endauth

            @guest
                <a href="{{ route('user.register') }}"
                   class="{{ Route::currentRouteName() === 'user.register' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                    Sign Up
                </a>

                <a href="{{ route('login') }}"
                   class="{{ Route::currentRouteName() === 'login' ? 'bg-gray-900 text-white' : 'text-gray-300' }}
                      hover:bg-gray-600 hover:text-white block px-4 py-2 rounded-md">
                    Log In
                </a>
            @endguest
        </nav>
    </aside>

<main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="flex justify-center mt-6">
        <div>
            @include('components.success')
            @include('components.error')
        </div>
    </div>

    <div class="container mx-auto mt-8">
        <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit User</h2>

        <form class="space-y-6" action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-900">User Name:</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-900">Email:</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update User
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('user.index') }}"
               class="inline-block text-indigo-600 hover:text-indigo-800 font-medium">
                Back to User List
            </a>
        </div>
    </div>
</div>
    </div>
</main>
</div>
</body>
</html>
